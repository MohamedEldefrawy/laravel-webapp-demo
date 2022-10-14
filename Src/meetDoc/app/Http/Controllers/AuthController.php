<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPostRequest;
use App\Http\Resources\AuthResource;
use App\Repository\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * @param Request $request
     * @return Application|Response|ResponseFactory
     * @author Abdullah Hegab
     * @updated Mohamed Eldefrawy
     *
     * * @OA\Post(
     *  path="/api/logout",
     *  tags={"Authorization"},
     *  summary="Logout Authnticated user by removing it's token",
     *  operationId="Logout",
     *  @OA\Response(
     *     response=200,
     *     description="Success",
     *     @OA\MediaType(
     *       mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * )
     **/
    public function logout(Request $request): Application|ResponseFactory|Response
    {
        if (auth()->user()->tokens()) {
            auth()->user()->tokens()->delete();
            return response([
                'message' => 'logged out'
            ], 200);
        }

        return response([
            "message" => "user is already logged out"
        ], 400);

    }

    /**
     * @param LoginPostRequest $request
     * @return Response|AuthResource|Application|ResponseFactory
     * @author Abdulla Hegab
     * @updated Mohamed Eldefrawy
     * @updated Ahmed Abdelaty
     *
     * @OA\Post(
     *  path="/api/login",
     *  tags={"Authorization"},
     *  summary="Login",
     *  operationId="login",
     *
     *   @OA\RequestBody (
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *           @OA\Property (
     *                property="name",
     *                type="string"
     *            ),
     *            @OA\Property(
     *                property="password",
     *                type="string"
     *            ),
     *            @OA\Property(
     *                property="device_id",
     *                type="string"
     *            ),
     *            @OA\Property(
     *                property="new_device",
     *                type="boolean",
     *                example=false
     *            )
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
     **/
    public function login(Request $request): Response|AuthResource|Application|ResponseFactory
    {
        if (!Auth::attempt($request->only('name', 'password'))) {
            return response([
                'message' => 'bad credentials'
            ], 400);
        }

        $user = Auth::user();

        if (UserRepository::checkNewDevice($request, $user)) {
            return response([
                'message' => 'trying to login from a new device'
            ], 401);
        }

        if ($request['new_device']) {
            UserRepository::addNewDevice($request['device_id'], $user->id);
        }

        return response(new AuthResource($user), 200);
    }
}
