<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repository\OtpService;
use App\Repository\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Creates the OTP
     * @param Request $request
     * @return JsonResponse|mixed|object
     * @author Ahmed Abdelaty
     */
    public function CreateOtp(Request $request): mixed
    {
        return OtpService::CreateOtp($request);
    }

    /**
     * Verifies the OTP
     * @param Request $request
     * @return mixed|object
     * @author Ahmed Abdelaty
     */
    public function ValidateOtp(Request $request): mixed
    {
        return OtpService::ValidateOtp($request);
    }


    /**
     * Setting a new password
     * @param Request $request
     * @return JsonResponse
     * @author Ahmed Abdelaty
     */
    public function SetPassword(Request $request): JsonResponse
    {
        return UserRepository::SetPassword($request);
    }
}
