<?php
namespace App\Contracts;

use Illuminate\Http\Request;

interface OtpTemplate {
  public static function CreateOtp(Request $request);
  public static function ValidateOtp(Request $request);
}
?>