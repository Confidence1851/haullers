<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiConstants;
use App\Mail\OrderInformation;
use App\Mail\Tested;
use App\Order;
use App\OrderContact;
use App\Payment;
use App\Route;
use App\RouteCategory;
use App\Traits\RoutePrice;
use App\Transformers\OrderTransformer;
use App\Transformers\RouteTransformer;
use App\Vehicle;
use Facade\FlareClient\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class OrderController extends ApiController
{
    private $routeCatModel;
    private $routeModel;
    private $vehicleModel;
    private $orderModel;
    private $paymentModel;
    public function __construct(Order $order, RouteCategory $routeCategory, Vehicle $vehicle, Route $route, Payment $payment)
    {
        $this->routeCatModel = $routeCategory;
        $this->routeModel = $route;
        $this->vehicleModel = $vehicle;
        $this->orderModel = $order;
        $this->paymentModel = $payment;
    }


    /**
     * @OA\Get(
     ** path="/order/history",
     *   tags={"Order"},
     *   summary="Display a list of orders",
     *   operationId="orders_history",
     *
     *   @OA\Parameter(
     *      name="token",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function history(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'search_keyword' => 'bail|nullable|string',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }
            $user = auth_api(true);
            $builder = $this->orderModel->where(['user_id' => $user->id]);

            if (!empty($key = $request->search_keyword)) {
                $builder = $builder->whereHas("vehicle" , function($query) use ($key){
                    $query->where("vehicle_name", "like", "%$key%");
                })->orWhereHas("payment" , function($query) use ($key){
                    $query->where("payment_ref_no", "like", "%$key%");
                });
            }
            
            $orders = $builder->orderby("id" , "desc")->paginate(ApiConstants::PAGINATION_SIZE_API);
            $orderTrans = new OrderTransformer;
            return validResponse("Vehicles search data retrieved", collect_pagination($orderTrans, $orders));
        } catch (ValidationException $e) {
            $message = "The given data was invalid.";
            return inputErrorResponse($message, ApiConstants::VALIDATION_ERR_CODE, $request, $e);
        } catch (\Exception $e) {
            $message = 'Something went wrong while processing your request.';
            return problemResponse($message, ApiConstants::SERVER_ERR_CODE, $request, $e);
        }
    }


    /**
     * @OA\Post(
     ** path="/order/initiate",
     *   tags={"Order"},
     *   summary="Initiate a new order",
     *   operationId="orders_initiate",
     *
     *   @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="phone",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="phone2",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="vehicle_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *    @OA\Parameter(
     *      name="route_id",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="token",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function initiate(Request $request)
    {
        DB::beginTransaction();
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'phone2' => 'nullable|string',
                'vehicle_id' => 'required|string|exists:vehicles,id',
                'route_id' => 'bail|nullable|string',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }
            $user = auth_api(true);

            $route_id = null;
            if(!empty($r = $request->route_id) && $r != "null"){
                $route_id = $r;
            }

            $route = $this->routeModel->find($route_id);
            $vehicle = $this->vehicleModel->find($request->vehicle_id);
            $data = RoutePrice::calc($vehicle, $route);


            $contact = OrderContact::create([
                'name' => $request["name"],
                'email' => $request["email"],
                'phone' => $request["phone"],
                'phone2' => $request["phone2"],
            ]);

            $storeOrder = $this->orderModel->create([
                "user_id" => $user->id,
                "route_id" => $route_id,
                "order_contact_id" => $contact->id,
                "vehicle_id" => $request["vehicle_id"],
                "price" => $data['price'],
                "status" => "Processing"
            ]);
            DB::commit();
            $orderTrans = new OrderTransformer;
            return validResponse("Order created successfully" , $orderTrans->transform($storeOrder) );
        } catch (ValidationException $e) {
            DB::rollBack();
            $message = "The given data was invalid.";
            return inputErrorResponse($message, ApiConstants::VALIDATION_ERR_CODE, $request, $e);
        } catch (\Exception $e) {
            DB::rollBack();
            $message = 'Something went wrong while processing your request.';
            return problemResponse($message, ApiConstants::SERVER_ERR_CODE, $request, $e);
        }
    }


    /**
     * @OA\Post(
     ** path="/order/complete",
     *   tags={"Order"},
     *   summary="Complete an order",
     *   operationId="order_complete",
     *  @OA\Parameter(
     *      name="order_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="reference",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="token",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function complete(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'order_id' => 'required|string|exists:orders,id',
                'reference' => 'required|string|unique:payments,payment_ref_no',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $user = auth_api(true);
            $order = $this->orderModel->find($request["order_id"]);

            $payment = Payment::create([
                'user_id' => $user->id,
                'payment_ref_no' => $request['reference'],
                'price' => $order->price,
                'status' => 1,
                'date' => today(),
            ]);

            $order->update([
                "status" => "Approved",
                "payment_id" => $payment->id
            ]);

            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'payment' => $payment,
                'order' => $order,
                'vehicle' => $order->vehicle,
            ];
            Mail::to($data['email'])->send(new OrderInformation($data));
            return validResponse("Order completed successfully");
        } catch (ValidationException $e) {
            $message = "The given data was invalid.";
            return inputErrorResponse($message, ApiConstants::VALIDATION_ERR_CODE, $request, $e);
        } catch (\Exception $e) {
            $message = 'Something went wrong while processing your request.';
            return problemResponse($message, ApiConstants::SERVER_ERR_CODE, $request, $e);
        }
    }
}
// keytool -genkey -v -keystore C:/Users/USER_NAME/nutella.jks -storetype JKS -keyalg RSA -keysize 2048 -validity 10000 -alias nutella