<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repository\Contracts\DoctorRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DoctorController extends Controller
{
    private DoctorRepositoryInterface $doctorRepository;


    public function __construct(DoctorRepositoryInterface $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }

    /**
     * @param Request $request
     * @return Application|Response|ResponseFactory
     * @author Abdullah Hegab
     *
     *
     * @OA\Get(
     *      path="/api/doctors/doctor/{id}/working-slots",
     *      tags={"Doctor"},
     *      summary="working-slots by Doctor id",
     *      security={
     *      {
     *      "sanctum": {}},
     *      },
     *
     * @OA\Parameter(
     *    name="id",
     *    in="path",
     *    description="ID of Doctor",
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
    public function getWorkingSlotsByDrId(Request $request): Application|ResponseFactory|Response
    {
        $doctor_id = $request->id;

        $workingSlotsByDoctor = $this->doctorRepository->getDoctorSlots($doctor_id);
        if (!empty($workingSlotsByDoctor)) {
            return response([
                'status' => true,
                'data' => $workingSlotsByDoctor,
            ], 200);
        }
        return response([
            "status" => false,
            "message" => 'working-slots for specific doctor not found',
        ], 404);
    }

    /**
     * @param Request $request
     * @return Application|Response|ResponseFactory
     * @author Mohamed Eldefrawy
     *
     * @OA\Get(
     *  path="/api/doctors/{id}/patients",
     *  tags={"Doctor"},
     *  summary="get patients of selected doctor",
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
    public function getPatients(Request $request): Response|Application|ResponseFactory
    {
        $patientsPerDoctor = $this->doctorRepository->getDoctorPatients($request->id);
        if (count($patientsPerDoctor) > 0) {
            return response([
                'status' => true,
                'data' => $patientsPerDoctor,
            ], 200);
        }
        return response([
            "status" => false,
            "message" => 'doctor-patients not found',
        ], 404);
    }

    /**
     * @param Request $id
     * @return Response|Application|ResponseFactory
     * @author Ahmed Abdelaty
     *
     * @OA\Get(
     *  path="/api/doctor/{id}",
     *  tags={"Doctor"},
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
    public function getDoctor($id): Response|Application|ResponseFactory
    {
        $doctorById = $this->doctorRepository->get($id);
        if (!empty($doctorById)) {
            return response([
                "status" => true,
                "data" => $doctorById,
            ], 200);
        }
        return response([
            "status" => false,
            "message" => 'doctor not found',
        ], 404);
    }
}
