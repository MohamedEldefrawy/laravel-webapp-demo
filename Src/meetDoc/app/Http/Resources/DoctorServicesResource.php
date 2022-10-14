<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorServicesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'serviceType' => new ServiceResource($this->service),
            'slots' =>  WorkingSlotResource::collection($this->workingSlots),

        ];
    }
}
