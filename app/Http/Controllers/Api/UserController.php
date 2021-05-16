<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiConstants;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    private $userModel;
    public function __construct(User $user)
    {
        $this->userModel = $user;
    }
    
    /**
     * @OA\Post(
     ** path="/profile/update",
     *   tags={"Profile"},
     *   summary="Update a user profile",
     *   operationId="profile_update",
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
    public function update(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'phone2' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }
            $user = auth_api(true);

            $user->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'phone2' => $request['phone2'],
            ]);

            return validResponse("Profile updated successfully");
        } catch (ValidationException $e) {
            $message = "The given data was invalid.";
            return inputErrorResponse($message, ApiConstants::VALIDATION_ERR_CODE, $request, $e);
        } catch (\Exception $e) {
            $message = 'Something went wrong while processing your request.';
            return problemResponse($message, ApiConstants::SERVER_ERR_CODE, $request, $e);
        }
    }

}
