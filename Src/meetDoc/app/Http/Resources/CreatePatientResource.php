<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CreatePatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array
     * @author Mohamed Eldefrawy
     */
    public function toArray($request): array
    {
        return [
            "status" => $this->status,
            "user" => $this->user,
            "message" => $this->message
        ];
    }
}
