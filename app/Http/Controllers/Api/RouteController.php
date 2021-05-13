<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiConstants;
use App\Http\Controllers\Controller;
use App\Route;
use App\RouteCategory;
use App\Transformers\RouteCategoryTransformer;
use App\Transformers\RouteTransformer;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RouteController extends Controller
{


    private $routeCatModel;
    private $routeModel;
    private $vehicleModel;
    public function __construct(RouteCategory $routeCategory, Vehicle $vehicle, Route $route)
    {
        $this->routeCatModel = $routeCategory;
        $this->routeModel = $route;
        $this->vehicleModel = $vehicle;
    }


    /**
     * @OA\Get(
     ** path="/route-category/list",
     *   tags={"Route"},
     *   summary="Display a list of route category routes",
     *   operationId="routes_category_routes",
     *
     *   @OA\Parameter(
     *      name="category_id",
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
    public function list(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'category_id' => 'bail|required|exists:route_categories,id',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }
            $routeTrans = new RouteTransformer();
            $routes = $this->routeModel->where(['route_cat_id' => $request->category_id])->orderBy('start', 'asc')->paginate(100);
            return validResponse("Route category list data retrieved", collect_pagination($routeTrans, $routes));
        } catch (ValidationException $e) {
            $message = "The given data was invalid.";
            return inputErrorResponse($message, ApiConstants::VALIDATION_ERR_CODE, $request, $e);
        } catch (\Exception $e) {
            $message = 'Something went wrong while processing your request.';
            return problemResponse($message, ApiConstants::SERVER_ERR_CODE, $request, $e);
        }
    }


    /**
     * @OA\Get(
     ** path="/route/calculate-price",
     *   tags={"Route"},
     *   summary="Calculate price for a route",
     *   operationId="route_calc_price",
     *
     *   @OA\Parameter(
     *      name="route_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="vehicle_id",
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
    public function calculate_price(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'route_id' => 'bail|required|exists:routes,id',
                'vehicle_id' => 'bail|required|exists:vehicles,id',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }
            $route = $this->routeModel->find($request->route_id);
            $vehicle = $this->vehicleModel->find($request->vehicle_id);

            $vehicleRouteCheck = $this->routeModel->where(["id" => $route->id , "route_cat_id" => $vehicle->category_id ])->count();

            // if($vehicleRouteCheck < 1){
            //     return problemResponse("Invalid route for this vehicle", ApiConstants::BAD_REQ_ERR_CODE, $request);
            // }

            $price = $route->price;
            $weight = $vehicle->capacity;
            $unit = $vehicle->unit;

            if(strtolower($unit) == strtolower("Tonne(s)")){
                $price = $price * $weight ;                
            }
            if(strtolower($unit) == strtolower("Kg")){
                $price = ($price / 1000) * $weight ;                
            }

            $data = [ 
                "price" => $price,
                "formatted_price" => format_money($price),
                "weight" => $weight,
                "unit" => $unit,
            ];
        
            return validResponse("Route price data retrieved", $data);
        } catch (ValidationException $e) {
            $message = "The given data was invalid.";
            return inputErrorResponse($message, ApiConstants::VALIDATION_ERR_CODE, $request, $e);
        } catch (\Exception $e) {
            $message = 'Something went wrong while processing your request.';
            return problemResponse($message, ApiConstants::SERVER_ERR_CODE, $request, $e);
        }
    }
}
