<?php

namespace App\Repository;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use App\Repository\Contracts\RepositoryInterface;
use App\Repository\Contracts\ServicesRepositoryInterface;

class ServicesRepository implements ServicesRepositoryInterface
{

    public function get_all()
    {
        // TODO: Implement get_all() method.
        $services = Service::all();
        return ServiceResource::collection($services);
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

}
