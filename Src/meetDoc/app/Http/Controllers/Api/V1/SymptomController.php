<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repository\Contracts\SymptomRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class SymptomController extends Controller
{
    private SymptomRepositoryInterface $symptomRepository;

    public function __construct(SymptomRepositoryInterface $symptomRepository)
    {
        $this->symptomRepository = $symptomRepository;
    }


    /**
     * @param $id
     * @return Response|Application|ResponseFactory
     * @author Mohamed Eldefrawy
     *
     * @OA\Get(
     * path="/api/symptoms/{id}",
     * summary="Get Patient Symptoms by patient id",
     * tags={"Symptoms"},
     * *security={
     *{
     *"sanctum": {}},
     *},
     * @OA\Parameter(
     *    name="id",
     *    in="path",
     *    description="ID of Patient",
     *    required=true,
     *    example="1",
     * ),
     * @OA\Response(
     *    response=200,
     *    description="All Patient Symptoms returned successfully",
     *     @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *     )
     * )
     *
     */
    public function getSymptoms($id): Response|Application|ResponseFactory
    {
        $SymptomsOfPatient = $this->symptomRepository->getSymptomsOfPatient($id);
        if (!empty($SymptomsOfPatient)) {
            return response([
                "status" => true,
                "data" => $SymptomsOfPatient,
            ], 200);
        }
        return response([
            "status" => false,
            "message" => "Symptoms not found",
        ], 404);
    }
}
