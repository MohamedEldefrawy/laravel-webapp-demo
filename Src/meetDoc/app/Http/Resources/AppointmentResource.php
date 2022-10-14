<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'patientName' => new PatientResource($this->patient),
            'departmentName' => new DepartmentResource($this->doctor_service->doctor->department),
            'appointment_date' => $this->start_date_time,
            'appointmentType' => new ServiceResource($this->doctor_service->service),
        ];
    }
}
