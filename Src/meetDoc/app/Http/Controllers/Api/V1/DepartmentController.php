<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repository\Contracts\DepartmentRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartmentController extends Controller
{
    private DepartmentRepositoryInterface $departmentRepository;

    public function __construct(DepartmentRepositoryInterface $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    /**
     * @param Request $request
     * @return Response|Application|ResponseFactory
     * @author Abdullah Hegab
     *
     * @OA\Get(
     *      path="/api/departments",
     *      tags={"Departments"},
     *      summary="get all departments",
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
    public function departments(Request $request): Response|Application|ResponseFactory
    {
        $departments = $this->departmentRepository->get_all();

        if (!empty($departments)) {
            return response([
                "status" => true,
                "data" => $departments,
            ], 200);
        }
        return response([
            "status" => false,
            "message" => 'Appointments not found',
        ], 404);
    }
}
