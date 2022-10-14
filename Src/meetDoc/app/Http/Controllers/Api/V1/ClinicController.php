<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repository\Contracts\ClinicRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ClinicController extends Controller
{

    private ClinicRepositoryInterface $clinicRepository;

    public function __construct(ClinicRepositoryInterface $clinicRepository)
    {
        $this->clinicRepository = $clinicRepository;
    }


    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     * @author Abdullah Hegab
     *
     *
     * @OA\Get(
     *      path="/api/clinics",
     *      tags={"Clinic"},
     *      summary="get all clinics",
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
    public function clinics(Request $request): Response|Application|ResponseFactory
    {
        $clinics = $this->clinicRepository->get_all();
        if (!empty($clinics)) {
            return response([
                "status" => true,
                "data" => $clinics
            ], 200);
        }
        return response([
            "status" => false,
            "message" => 'clinics not found',
        ], 404);

    }

    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     * @author Abdullah Hegab
     *
     *
     * @OA\Get(
     *      path="/api/clinics/clinic/{id}/working-slots",
     *      tags={"Clinic"},
     *      summary="working-slots by Clinic id",
     *      security={
     *      {
     *      "sanctum": {}},
     *      },
     * @OA\Parameter(
     *    name="id",
     *    in="path",
     *    description="ID of Clinic",
     *    required=true,
     *    example="1",
     * ),
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
    public function workingSlotsByClinicId(Request $request): Response|Application|ResponseFactory
    {
        $workingSlotsByClinicId = $this->clinicRepository->get($request->id);
        if (!empty($workingSlotsByClinicId)) {
            return response([
                'status' => true,
                'data' => $workingSlotsByClinicId
            ], 200);
        }
        return response([
            "status" => false,
            "message" => 'working-slots not found',
        ], 404);
    }

    /**
     * @param Request $id
     * @return Application|Response|ResponseFactory
     * @author Ahmed Abdelaty
     * @updated Abdullah Hegab
     *
     * @OA\Get(
     *  path="/api/clinic-doctor/{id}",
     *  tags={"Clinic"},
     *  summary="get doctor by id",
     *
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="ID of Doctor",
     *      required=true,
     *      example="1",
     *  ),
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
     *  @OA\Response(
     *    response=410,
     *     description="Gone"
     *   ),
     *  @OA\Response(
     *    response=403,
     *    description="Forbidden"
     *   )
     * )
     **/
    public function getDoctor($id): ResponseFactory|Application|Response
    {
        $role = Auth::user()->roles[0]->name;
        $doctorByClinic = $this->clinicRepository->getDoctor($id, $role);
        if (!empty($doctorByClinic)) {
            return response([
                "status" => true,
                "data" => $doctorByClinic
            ], 200);
        }
        return response([
            "status" => false,
            "message" => 'doctor not found',
        ], 404);
    }
}
