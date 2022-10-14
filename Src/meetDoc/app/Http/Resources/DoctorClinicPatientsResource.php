<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorClinicPatientsResource extends JsonResource
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
            "patient" => new PatientResource($this->patient)
        ];
    }
}
