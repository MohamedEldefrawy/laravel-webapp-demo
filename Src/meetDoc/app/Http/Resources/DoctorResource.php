<?php

namespace App\Http\Resources;

use App\Models\WeekDay;
use App\Repository\DoctorRepository;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->user_id,
            'doctor_services' => DoctorServicesResource::collection($this->doctorServices),
        ];
    }
}
