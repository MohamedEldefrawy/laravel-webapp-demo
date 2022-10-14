<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Models\User;
use Ichtrojan\Otp\Otp;
use App\Contracts\OtpTemplate;

class OtpService implements OtpTemplate
{

    public static function CreateOtp(Request $request)
    {
        if ($request['user'] == 'doctor') {
            return CreateDoctorsOTP($request);
        } elseif ($request['user'] == 'patient') {
            return CreateOTP($request);
        } else {
            return response()->json(['status' => false, 'message' => "please assign a user role"]);
        }
    }

    //Validates the OTP sent from User and returns a response with status true or false and an explaining message
    //by Ahmed Abdelaty
    public static function ValidateOtp(Request $request)
    {
        $otp = new Otp();
        $otp = $otp->validate($request['phone'], $request['otp']);
        return $otp;
    }
}

//Checks if the user exists in the database and if he exists creates an OTP and saves it in the
//database and keeps it valid for 3 minutes and responds with a true or false status and an explaining message
//by Ahmed Abdelaty
function CreateDoctorsOTP(Request $request)
{
    if (User::where('name', $request['phone'])->exists()) {
        return CreateOTP($request);
    } else {
        return response()->json(['status' => false, 'message' => "number doesn't exist"]);
    }
}

function CreateOTP(Request $request){
    $otp = new Otp();
    $otp = $otp->generate($request['phone'], 4, 3);
    return $otp;
}

?>
