<?php

namespace App\Http\Controllers\Api;

use App\Mail\ResetPasswordMail;
use App\Models\User;
use App\Notifications\Welcome;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EmailVerificationController extends Controller
{
    /**
     * @param Request $request
     * @return Response|Application|ResponseFactory
     * @author Abdullah Hegab
     * @OA\Post(
     *  path="/api/email/reset-password",
     *  tags={" Email - admin reset password -"},
     *  summary="admin send eamil to reset password",
     *
     *   @OA\RequestBody (
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *           @OA\Property (
     *                property="name",
     *                type="string"
     *            ),
     *        )
     *     )
     *   ),
     *  @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\MediaType(
     *       mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *   @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *   )
     * )
     */
    public function emailCheck(Request $request): Response|Application|ResponseFactory
    {
        $username = $request->name;
        $selectedUser = User::where('name', $username)->get()->first();
        if ($selectedUser) {
            Mail::to($selectedUser->email)->send(new ResetPasswordMail($selectedUser));
            return response([
                'status' => true,
                'data' =>[
                    'email' => $selectedUser->email,
                    'message' => 'Email has been sent ! check your inbox',
                ],
            ], 200);
        } else {
            return response([
                'status' => false,
                'message' => 'not valid'
            ], 400);
        }
    }

    /**
     * @param Request $request
     * @return Response|Application|ResponseFactory
     * @author Abdullah Hegab
     *
     *  * @OA\Post(
     *  path="/api/email/confirm-password-change",
     *  tags={" Email - admin reset password -"},
     *  summary="confirm password change",
     *
     *   @OA\RequestBody (
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *           @OA\Property (
     *                property="password",
     *                type="string"
     *            ),
     *           @OA\Property (
     *                property="confirmPassword",
     *                type="string"
     *            ),
     *        )
     *     )
     *   ),
     *  @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\MediaType(
     *       mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *   @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *   )
     * )
     */
    public function changePassword(Request $request): Response|Application|ResponseFactory
    {
        $newPassword = $request->password;
        $confirmPassword = $request->confirmPassword;
        $username = $request->name;
        if ($newPassword == $confirmPassword) {

            User::where('name', $username)
                ->update(['password' => Hash::make($newPassword)]);

            return response([
                'status' => true,
                'message' => 'password field updated successfully',
            ], 200);

        } else {
            return response([
                'status' => false,
                'message' => 'password field in not updated',
            ], 400);
        }

    }


}
