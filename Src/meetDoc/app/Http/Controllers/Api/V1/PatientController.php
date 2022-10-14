<?php

namespace App\Http\Controllers\Api\V1;

use App\Builder\Contracts\UserBuilderInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePatientRequest;
use App\Models\Clinic;
use App\Models\Patient;
use App\Models\User;
use App\Repository\Contracts\PatientRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PatientController extends Controller
{
    private PatientRepositoryInterface $patientRepository;
    private UserBuilderInterface $patientBuilder;

    public function __construct(PatientRepositoryInterface $patientRepository, UserBuilderInterface $patientBuilder)
    {
        $this->patientRepository = $patientRepository;
        $this->patientBuilder = $patientBuilder;
    }

    /**
     * get patients controller
     * @return array
     * @author Abdulla Hegab
     */
    public function getPatients(): array
    {
        $getAllPatients = Patient::get();

        return [
            'allPatients' => $getAllPatients,
        ];

    }

    /**
     * @param CreatePatientRequest $request
     * @return  Response|Application|ResponseFactory
     * @author Abdullah Hegab
     * @updated Mohamed Eldefrawy
     * @OA\Post(
     *      path="/api/patients",
     *      summary="create patient",
     *      tags={"Patients"},
     *      security={
     *      {
     *      "sanctum": {}},
     *      },
     *
     * @OA\RequestBody (
     *   @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *          @OA\Property (
     *                property="firstName",
     *                type="string"
     *            ),
     *          @OA\Property (
     *                property="lastName",
     *                type="string"
     *            ),
     *           @OA\Property (
     *                property="clinicCode",
     *                type="string"
     *            ),
     *          @OA\Property (
     *                property="phone",
     *                type="string"
     *            ),
     *          @OA\Property (
     *                property="user",
     *                type="string"
     *            ),
     *          )
     *      )
     * ),
     *
     * @OA\Response(
     *      response=200,
     *      description="patient has been created successfully",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *    ),
     * @OA\Response(
     *      response=400,
     *      description="patient phone is duplicate or no clinic found with clinicCode",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *    ),
     *  )
     */
    public function createPatient(CreatePatientRequest $request): Application|ResponseFactory|Response
    {
        $selected_user = User::where('name', $request->phone)->first();
        $selected_clinic = Clinic::where('clinicCode', $request->clinicCode)->first();

        if ($selected_clinic == null) {
            return response([
                'status' => false,
                'message' => "couldn't find clinic with code " . $request->clinicCode], 400);
        }

        if ($selected_user == null) {

            $this->patientBuilder->setPhone($request->phone);
            $this->patientBuilder->setFirstName($request->firstName);
            $this->patientBuilder->setLastName($request->lastName);
            $this->patientBuilder->setClinicCode($request->clinicCode);
            $this->patientBuilder->setClinicId($selected_clinic->id);

            $this->patientRepository->create($this->patientBuilder);

            return response([
                'status' => true,
                'message' => "patient has been created successfully",
            ], 200);
        } else {
            return response([
                'status' => false,
                'message' => 'user with phone ' . $request->phone . ' already exist'], 400);
        }
    }


    /**
     * get patient
     * @param $id
     * @return Application|Response|ResponseFactory
     * @author Mohamed Eldefrawy
     *
     *  * @OA\Get(
     *      path="/api/patients/{id}",
     *      summary="Get Patient by patient id",
     *      tags={"Patients"},
     *      security={
     *      {
     *      "sanctum": {}},
     *      },
     * @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="ID of Patient",
     *      required=true,
     *      example="1",
     *  ),
     * @OA\Response(
     *      response=200,
     *      description="Patient info  returned successfully",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *    ),
     * @OA\Response(
     * response=410,
     * description="Couldn't find selected patient",
     * @OA\MediaType(
     *  mediaType="application/json",
     *   )
     *  )
     * )
     */
    public function getPatient($id): Application|ResponseFactory|Response
    {
        return $this->patientRepository->get($id);
    }

    /**
     * @param Request $request
     * @return array
     * @author Ahmed Abdelaty
     */
    public function GetPatientsByClinic(Request $request): array
    {
        return $this->patientRepository->GetPatientsByClinic($request->id);
    }


    /**
     * @param Request $request
     * @return Response|Application|ResponseFactory
     * @author Abdullah Hegab
     * @OA\Post(
     *      path="/api/is-patient-exist",
     *      summary="check if patient exist",
     *      tags={"Patients"},
     *      security={
     *      {
     *      "sanctum": {}},
     *      },
     *
     * @OA\RequestBody (
     *   @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *          @OA\Property (
     *                property="phone",
     *                type="string"
     *            ),
     *          )
     *      )
     * ),
     *
     * @OA\Response(
     *      response=200,
     *      description="patient has been created successfully",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *    ),
     * @OA\Response(
     *      response=400,
     *      description="patient phone is duplicate or no clinic found with clinicCode",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *    ),
     *  )
     */
    public function isPatientExist(Request $request): Response|Application|ResponseFactory
    {
        $phone = $request->phone;
        if ($phone == "" || strlen($phone) < 11) return response(['message' => "please enter a correct mobile number"], 400);

        $user = User::where('name', '=', $phone)->get()->count();

        if (!$user) {
            return response([
                "patient-State" => false,
                "message" => "patient doesn't exist"
            ], 404);
        } else {
            return response([
                "patient-State" => true,
                "message" => "patient exists"
            ], 200);
        }
    }


}
