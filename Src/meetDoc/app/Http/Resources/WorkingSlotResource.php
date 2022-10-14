<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkingSlotResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array|Arrayable|\JsonSerializable
     * @author Abdullah Hegab
     */
    public function toArray($request): array|\JsonSerializable|Arrayable
    {

        return [
            'id' => $this->id,
            'start_time' => $this->start_time,
            'day' => new WeekDayResource($this->weekDay),
        ];
    }
}
