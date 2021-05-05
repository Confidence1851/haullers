<?php

namespace App\Traits;

use App\Transformers\UserTransformer;
use App\User;

class Profile
{


    private $userModel;
    private $loggedInDeviceRepo;

    public function __construct(User $userModel)
    {

        $this->userModel = $userModel;
    }

    public function recordLogin($user , $token){
        $loginQuery = [
            "user_id" => $user->id,
            "ip_address" => request()->ip(),
        ];
        $loginData = [
            "token" => $token,
            "number_of_times_logged_in" => 1
        ];

        $loginRecord = $this->loggedInDeviceRepo->findWhere($loginQuery)->first();

        if (empty($loginRecord)) {
            $this->loggedInDeviceRepo->create(
                array_merge(
                    $loginQuery,
                    $loginData,
                )
            );
        } else {
            $loginData["number_of_times_logged_in"] = $loginRecord->number_of_times_logged_in + 1;
            $this->loggedInDeviceRepo->update($loginData, $loginRecord->id);
        }
    }


    public function onAuthorized($token, $request, $user = null)
    {
        $transformer = new UserTransformer();
        $user = is_null($user) ? auth_api(true) : $user;

        $data = [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth_api()->factory()->getTTL() * 60,
            'user' => $transformer->transform($user),
        ];

        return validResponse("Authorisation successful", $data, $request);
    }

}
