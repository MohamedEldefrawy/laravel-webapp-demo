<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repository\Contracts\ServicesRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    private ServicesRepositoryInterface $servicesRepository;

    public function __construct(ServicesRepositoryInterface $servicesRepository)
    {
        $this->servicesRepository = $servicesRepository;
    }

    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     *
     * @OA\Get(
     *      path="/api/services",
     *      tags={"Services"},
     *      summary="get all services",
     *      security={
     *      {
     *      "sanctum": {}},
     *      },
     *
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
    public function services(Request $request): Response|Application|ResponseFactory
    {
        $serivces = $this->servicesRepository->get_all();
        if (!empty($serivces)) {
            return response([
                "status" => true,
                "data" => $serivces,
            ], 200);
        }
        return response([
            "status" => false,
            "message" => "services not found",
        ], 404);
    }
}
