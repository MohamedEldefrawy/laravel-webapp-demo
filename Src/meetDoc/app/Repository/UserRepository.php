<?php
namespace App\Repository;

use App\Models\User;
use App\Models\UserDevice;
use App\Repository\Contracts\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @author Ahmed Abdelaty
     */
    public static function SetPassword(Request $request): JsonResponse
    {
        if (isset($request['password'])) {
            if (User::where('name', $request['phone'])->exists()) {
                User::where('name', $request['phone'])
                    ->update(['password' => Hash::make($request['password'])]);
                return response()->json(['status' => true, 'message' => "password has been set successfully"]);
            } else {
                return response()->json(['status' => false, 'message' => "wrong phone number"]);
            }
        } else {
            return response()->json(['status' => false, 'message' => "no password has been passed"]);
        }
    }

    /**
     * @param Request $request
     * @param $user
     * @return bool
     * @author Ahmed Abdelaty
     */
    public static function checkNewDevice(Request $request, $user)
    {
        return !(UserDevice::where([['user_id', $user->id], ['device', '=', $request['device_id']]])->exists() or $request['new_device']) and $request['device_id'] != 'web';
    }

    /**
     * @param $deviceId
     * @param $id
     * @return void
     * @author Ahmed Abdelaty
     */
    public static function addNewDevice($deviceId, $id)
    {
        UserDevice::create([
            'user_id' => $id,
            'device' => $deviceId
        ]);
    }
}

?>
