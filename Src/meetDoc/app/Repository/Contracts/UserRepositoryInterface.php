<?php

namespace App\Repository\Contracts;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public static function SetPassword(Request $request);

    public static function checkNewDevice(Request $request, $user);

    public static function addNewDevice($deviceId, $id);
}
