<?php

namespace App\Http\Resources;

use App\Models\WorkingSlot;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClinicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array
     * @author Abullah Hegab
     * @updated Mohamed Eldefrawy
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            "slotDuration" => WorkingSlot::all()->first()->break_time_in_minutes,
            "breakTime" => WorkingSlot::all()->first()->slot_duration,
            'doctor' => $this->doctors->count() > 0 ? new DoctorResource($this->doctors[0]) : "",
        ];
    }
}
