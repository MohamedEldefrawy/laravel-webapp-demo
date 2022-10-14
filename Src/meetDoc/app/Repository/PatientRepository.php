<?php

namespace App\Repository;

use App\Http\Resources\CreatePatientResource;
use App\Http\Resources\PatientResource;
use App\Http\Resources\PatientsPerClinicResource;
use App\Models\Clinic;
use App\Models\ClinicPatient;
use App\Models\Patient;
use App\Models\User;
use App\Repository\Contracts\DocumentRepositoryInterface;
use App\Repository\Contracts\PatientRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class PatientRepository implements PatientRepositoryInterface
{

    private DocumentRepositoryInterface $documentService;


    public function __construct(DocumentRepositoryInterface $documentService)
    {
        $this->documentService = $documentService;
    }

    public function get_all()
    {
        // TODO: Implement get_all() method.
    }

    /**
     * @param $id
     * @return Application|ResponseFactory|Response
     * @author Mohamed Eldefrawy
     */
    public function get($id): Response|Application|ResponseFactory
    {
        $selectedPatient = Patient::with(["user", "medicalDocuments", "symptoms"])
            ->find($id);
        if ($selectedPatient) {
            $this->documentService->update($id, null);
            return response(new PatientResource($selectedPatient), 200);
        } else
            return response(["message" => "Couldn't find selected patient"], 404);
    }

    /**
     * @param $model
     * @return CreatePatientResource
     * @author Mohamed Eldefrawy
     */
    public function create($model): CreatePatientResource
    {
        $newUser = User::create([
            'name' => $model->getPhone(),
        ])->assignRole("Patient");


        $patient = Patient::create([
            "user_id" => $newUser->id,
            "weight" => $model->getWeight(),
            "height" => $model->getHeight(),
            "gender" => $model->getGender(),
            "age" => $model->getAge(),
            "blood_type" => $model->getBloodType(),
            "first_name" => $model->getFirstName(),
            "last_name" => $model->getLastName(),
            "created_by" => $newUser->id
        ]);

        foreach (config('global.patientRolePermissions') as $permission) {
            $newUser->givePermissionTo($permission);
        }

        ClinicPatient::create([
            'patient_code' => $model->getClinicCode(),
            'created_by' => $newUser->id,
            'patient_id' => $patient->id,
            'clinic_id' => $model->getClinicId(),
        ]);

        return new CreatePatientResource(
            [
                "status" => true,
                "user" => $patient,
                "message" => "patient has been created successfully."
            ]);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function update($id, $model)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param $id
     * @return array
     * @author Abdulla Hegab
     * @updated by Ahmed Abdelaty
     */
    public function GetPatientsByClinic($id)
    {
        $clinic = Clinic::with("clinicsPatients")->where('id', $id)->get()->first();
        $clinicPatients = $clinic->clinicsPatients;
        $patients = [];

        foreach ($clinicPatients as $clinicPatient) {
            if ($clinicPatient->patient->appointments->count() > 0) {
                $patients[] = new PatientsPerClinicResource($clinicPatient->patient);
            }
        }

        return ['patients' => $patients];
    }
}
