<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientsPerClinicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     * @author Ahmed Abdelaty
     */
    public function toArray($request)
    {
         return [
            "name" => $this->first_name . " " . $this->last_name,
            "id" => $this->user_id,
            "age" => $this->age,
            "mobileNumber" => $this->user->name,
            "lastVisit" => $this->appointments->sortByDesc('id')->first()->end_date_time,
         ];
    }
}
