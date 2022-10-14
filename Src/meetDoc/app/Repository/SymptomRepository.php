<?php

namespace App\Repository;

use App\Http\Resources\SymptomsResource;
use App\Models\PatientSymptom;
use App\Repository\Contracts\RepositoryInterface;
use App\Repository\Contracts\SymptomRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SymptomRepository implements SymptomRepositoryInterface
{

    public function get_all()
    {
        // TODO: Implement get_all() method.
    }

    public function get($id)
    {
        // TODO: Implement get() method.
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
     * @param $patientId
     * @return AnonymousResourceCollection
     * @author Mohamed Eldefrawy
     */
    public function getSymptomsOfPatient($patientId): AnonymousResourceCollection
    {
        return SymptomsResource::collection(PatientSymptom::all()->where('patient_id', $patientId));
    }
}
