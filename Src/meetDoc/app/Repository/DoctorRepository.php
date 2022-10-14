<?php

namespace App\Repository;

use App\Http\Resources\DoctorClinicPatientsResource;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\DoctorWebResource;
use App\Models\Doctor;
use App\Repository\Contracts\RepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection as AnonymousResourceCollectionAlias;

class DoctorRepository implements RepositoryInterface
{

    public function get_all()
    {
        // TODO: Implement get_all() method.
    }

    /**
     * @param $id
     * @return DoctorWebResource
     * @author Ahmed Abdelaty
     */
    public function get($id)
    {
        $doctor = Doctor::where('id', $id)->first();
        return new DoctorWebResource($doctor);
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

    /**
     * @param $id
     * @return AnonymousResourceCollectionAlias
     * @author Abdullah Hegab
     */
    public function getDoctorSlots($id): AnonymousResourceCollectionAlias
    {
        $doctor = Doctor::where('user_id', $id)->with('doctorServices')->get();
        return DoctorResource::collection($doctor);
    }

    /**
     * get patients of  selected doctor by id
     * @param $id
     * @return AnonymousResourceCollectionAlias|array
     * @author Mohamed Eldefrawy
     */
    public function getDoctorPatients($id): AnonymousResourceCollectionAlias|array
    {
        $selectedDoctor = Doctor::with("clinic")->find($id);
        if ($selectedDoctor !== null) {
            return DoctorClinicPatientsResource::collection($selectedDoctor->clinic->clinicsPatients);
        } else
            return [];
    }
}
