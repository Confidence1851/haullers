<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\ApiConstants;
use App\Http\Controllers\Api\ApiController;
use App\Traits\Notifications;
use App\Traits\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class RegisterController extends ApiController
{
    use Notifications;


    private $userModel;
    private $profile;

    public function __construct(User $userModel, Profile $profile)
    {

        $this->userModel = $userModel;
        $this->profile = $profile;
    }

    /**
     * @OA\Post(
     ** path="/register",
     *   tags={"Authentication"},
     *   summary="Register",
     *   operationId="register",
     *
     *   @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *
     * @OA\Parameter(
     *      name="phone",
     *      in="query",
     *      description="Optional",
     *      required=false,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),

     *   @OA\Parameter(
     *      name="password",
     *      in="query",
     *      required=true,
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
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        DB::beginTransaction();
        try {
            $v_rule = Rule::requiredIf(strtolower($request["role"]) == "vendor");
            $validator = Validator::make($request->all(), [
                'name' => 'bail|required|string|max:50',
                'email' => 'bail|required|string|email|max:50|unique:users',
                'phone' => 'bail|nullable|string|max:15',
                'password' => 'bail|required|string|min:6',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $data = $validator->validated();
            $data["role"] = "user";
            $data['password'] = Hash::make($request['password']);
            $user = $this->userModel->create($data);

            $credentials = $request->only('email', 'password');
            if (!$token = auth_api()->attempt($credentials)) {
                $message = "Your Registration is successful but an access token could not be generated for your account! Kindly go back and login";
                return problemResponse($message, ApiConstants::AUTH_ERR_CODE, $request);
            }

            DB::commit();
            // All good so return the token
            return $this->profile->onAuthorized($token, $request , $user);
        } catch (ValidationException $e) {
            DB::rollback();
            $message = "The given data was invalid.";
            return inputErrorResponse($message, ApiConstants::VALIDATION_ERR_CODE, $request, $e);
        } catch (\Exception $e) {
            DB::rollback();
            $message = 'Something went wrong while processing your request.';
            return problemResponse($message, ApiConstants::SERVER_ERR_CODE, $request, $e);
        }
    }


}
