<?php

namespace App\Repository;

use App\Http\Resources\WeekDayResource;
use App\Models\WeekDay;
use App\Repository\Contracts\RepositoryInterface;
use App\Repository\Contracts\WeekDayRepositoryInterface;
use App\Repository\Contracts\WorkingSlotsRepositoryInterface;

class WeekDayRepository implements WeekDayRepositoryInterface
{

    public function get_all()
    {
        $days = WeekDay::with('workingSlots')->get();
        return WeekDayResource::collection($days);
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
