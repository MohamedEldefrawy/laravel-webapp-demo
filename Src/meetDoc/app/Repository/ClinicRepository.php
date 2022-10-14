<?php

namespace App\Repository;

use App\Http\Resources\ClinicResource;
use App\Http\Resources\DoctorMobileDocResource;
use App\Http\Resources\DoctorWebResource;
use App\Http\Resources\PatientMobileDocResource;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Repository\Contracts\ClinicRepositoryInterface;


class ClinicRepository implements ClinicRepositoryInterface
{

    /**
     * @author Abdullah Hegab
     */
    public function get_all()
    {
        $clinics = Clinic::all();
        return $clinics;
    }

    /**
     * @param $id
     * @return ClinicResource|array
     * @author Abdullah Hegab
     */
    public function get($id): ClinicResource|array
    {
        $clinic = Clinic::with("doctors")->find($id);
        if ($clinic)
            return new ClinicResource($clinic);
        else
            return [];
    }

    public function create($model)
    {
        // TODO: Implement create() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function update($id, $model)
    {
        // TODO: Implement update() method.
    }

    public function getDoctor($id, $role)
    {
        $doctor = Doctor::where('clinic_id', $id)->first();
        if (isset($doctor)) {
            if ($role == 'SuperAdmin' || $role == 'ClinicStaff' || $role == 'ClinicAdmin') {
                return new DoctorWebResource($doctor);
            } elseif ($role == 'Doctor') {
                return new DoctorMobileDocResource($doctor);
            } elseif ($role == 'Patient') {
                return new PatientMobileDocResource($doctor);
            }
        } else {
            return null;
        }
    }
}
