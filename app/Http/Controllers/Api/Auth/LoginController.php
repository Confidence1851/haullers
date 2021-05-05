<?php
namespace App\Http\Controllers\Api\Auth;

use App\Helpers\ApiConstants;
use App\Http\Controllers\Api\ApiController;
use App\Traits\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends ApiController{

    private $userModel;
    private $profile;

    public function __construct(User $userModel, Profile $profile)
    {

        $this->userModel = $userModel;
        $this->profile = $profile;
    }

    /**
     * @OA\Post(
     ** path="/login",
     *   tags={"Authentication"},
     *   summary="Login",
     *   operationId="login",
     *
     *   @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
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
    public function login(Request $request)
    {

        try{
            $validator = Validator::make($request->all(), [
                'email' => 'bail|required|email|exists:users,email',
                'password' => 'bail|required|string|max:255'
            ]);

            if ($validator->fails()){
                throw new ValidationException($validator);
            }

            $credentials = ['email' => $request->email, 'password' => $request->password];

            if (!$token = auth_api()->attempt($credentials)) {
                $message = "Invalid credentials";
                return problemResponse($message, ApiConstants::AUTH_ERR_CODE, $request);
            }
            $user = auth_api(true);

            // All good so return the token
            return $this->profile->onAuthorized($token, $request, $user);

        } catch (ValidationException $e) {
			$message = "The given data was invalid.";
			return inputErrorResponse($message, ApiConstants::VALIDATION_ERR_CODE, $request, $e);
		} catch (\Exception $e) {
			$message = 'Something went wrong while processing your request.';
			return problemResponse($message, ApiConstants::SERVER_ERR_CODE, $request, $e);
		}
    }




}





