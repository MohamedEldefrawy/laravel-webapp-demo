<?php

namespace App\Repository;

use App\Http\Resources\WorkingSlotResource;
use App\Models\WorkingSlot;
use App\Repository\Contracts\RepositoryInterface;
use App\Repository\Contracts\WorkingSlotsRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WorkingSlotRepository implements WorkingSlotsRepositoryInterface
{

    /**
     * @return AnonymousResourceCollection
     * @author Abdullah Hegab
     */
    public function get_all()
    {
        $workingSlots = WorkingSlot::with('doctorService', 'weekDay')->get();
        return WorkingSlotResource::collection($workingSlots);
    }

    public function get($id)
    {
        // TODO: Implement get() method
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

//    public function workingSlotsByService($id)
//    {
//
//        $service = Service::where('id', $id)->get();
//        $doctorServices =\App\Models\DoctorRepository::where('id',$service[0]->id)->get();
//
//
//        return [
//            'name'=> $service[0],
//            'services'=> DoctorServicesResource::collection($doctorServices)
//        ];
//
//    }
}
