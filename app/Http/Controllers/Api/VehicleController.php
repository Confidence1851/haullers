<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiConstants;
use App\Http\Controllers\Controller;
use App\Transformers\VehicleCategoryTransformer;
use App\Transformers\VehicleTransformer;
use App\Vehicle;
use App\VehicleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class VehicleController extends Controller
{

    private $vehicleCatModel;
    private $vehicleModel;
    public function __construct(VehicleCategory $vehicleCategory, Vehicle $vehicle)
    {

        $this->vehicleCatModel = $vehicleCategory;
        $this->vehicleModel = $vehicle;
    }

    /**
     * @OA\Get(
     ** path="/vehicle/index",
     *   tags={"Vehicle"},
     *   summary="Get Vehicles by categories for homepage",
     *   operationId="vehicle_index",
     *
     *   @OA\Parameter(
     *      name="category_id",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="searchKeyword",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *          type="string"
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
    public function index(Request $request)
    {
        try {
            // $builder = $this->vehicleCatModel;
            // if(!empty($key = $request->category_id)){

            // }

            $vehicleCategoryTrans = new VehicleCategoryTransformer;
            $vehicleCats = $this->vehicleCatModel->get();
            $categories = collect();
            foreach ($vehicleCats as $cat) {
                $categories->push($vehicleCategoryTrans->index($cat));
            }

            return validResponse("Homepage data retrieved", $categories);
        } catch (\Exception $e) {
            $message = 'Something went wrong while processing your request.';
            return problemResponse($message, ApiConstants::SERVER_ERR_CODE, $request, $e);
        }
    }

    /**
     * @OA\Get(
     ** path="/vehicle/information",
     *   tags={"Vehicle"},
     *   summary="Display a Vehicle information",
     *   operationId="vehicle_info",
     *
     *   @OA\Parameter(
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
    public function info(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'vehicle_id' => 'bail|required|exists:vehicles,id',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }
            $vehicleTrans = new VehicleTransformer(true);
            $vehicle = $this->vehicleModel->find($request->vehicle_id);

            return validResponse("Homepage data retrieved", $vehicleTrans->transform($vehicle));
        } catch (ValidationException $e) {
            $message = "The given data was invalid.";
            return inputErrorResponse($message, ApiConstants::VALIDATION_ERR_CODE, $request, $e);
        } catch (\Exception $e) {
            $message = 'Something went wrong while processing your request.';
            return problemResponse($message, ApiConstants::SERVER_ERR_CODE, $request, $e);
        }
    }
}
