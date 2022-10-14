<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorPatientsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     * @author Mohamed Eldefrawy
     */
    public function toArray($request)
    {
        return [
            "id" => $this->user_id,
            "name" => $this->first_name . " " . $this->last_name,
            "clinic" => new DoctorClinicResource($this->clinic)
        ];
    }
}
