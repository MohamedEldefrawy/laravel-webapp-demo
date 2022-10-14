<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientMobileDocResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title'=>$this->title,
            'name'=>$this->first_name.' '.$this->last_name,
            'department'=> $this->department->name,
            'yearsOfExperience'=>$this->years_of_experience,
            'experience'=> DoctorExperienceResource::collection($this->doctorExperience),
            'certificate'=>$this->doctorCertificate,
            'education'=>$this->doctorEducation,
            'sessions'=>array_sum($this->doctorServices->map->appointments->map->count()->toArray()),
            'address' => $this->clinic->address,
        ];
    }
}
