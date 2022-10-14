<?php

namespace App\Repository;

use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\Service;
use App\Repository\Contracts\AppointmentRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AppointmentRepository implements AppointmentRepositoryInterface
{

    /**
     * @return AnonymousResourceCollection
     * @author Abdullah Hegab
     */
    public function get_all()
    {
        // TODO: Implement get_all() method.
        $appointments = Appointment::with(['doctor_service', 'patient'])->get();
        return AppointmentResource::collection($appointments);
    }

    public function get($id)
    {
        // TODO: Implement get() method.
    }

    public function create($model)
    {
        // TODO: Implement create() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function update($id, $model)
    {
        // TODO: Implement update() method.
    }

    public function cancel($id)
    {
        $appointment = Appointment::where('id', $id)->get()->first();
        if ($appointment) {
            $appointment->update(['active' => false]);
        }
        return $appointment;
    }

    public function appointmentsPerDateService($filterDate, $filterServiceType)
    {

        $services = Service::where('name', $filterServiceType)->get();
        $doctorServices = \App\Models\DoctorService::where('id', $services[0]->id)->get();
        $appointments = Appointment::with(['patient'])->where('start_date_time', $filterDate)->whereIn('doctor_service_id', $doctorServices->map->id)->get();
        return [
            'appointments' => $appointments
        ];
    }
}
