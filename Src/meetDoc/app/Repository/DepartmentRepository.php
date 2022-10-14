<?php

namespace App\Repository;

use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use App\Repository\Contracts\DepartmentRepositoryInterface;

class DepartmentRepository implements DepartmentRepositoryInterface
{

    public function get_all()
    {
        // TODO: Implement get_all() method.
        $departments = Department::all();
        return DepartmentResource::collection($departments);
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
