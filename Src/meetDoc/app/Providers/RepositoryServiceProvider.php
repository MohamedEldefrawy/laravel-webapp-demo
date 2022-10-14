<?php

namespace App\Providers;

use App\Repository\AppointmentRepository;
use App\Repository\ClinicRepository;
use App\Repository\Contracts\AppointmentRepositoryInterface;
use App\Repository\Contracts\ClinicRepositoryInterface;
use App\Repository\Contracts\DepartmentRepositoryInterface;
use App\Repository\Contracts\DoctorRepositoryInterface;
use App\Repository\Contracts\DocumentRepositoryInterface;
use App\Repository\Contracts\NoteRepositoryInterface;
use App\Repository\Contracts\PatientRepositoryInterface;
use App\Repository\Contracts\ServicesRepositoryInterface;
use App\Repository\Contracts\SymptomRepositoryInterface;
use App\Repository\Contracts\WeekDayRepositoryInterface;
use App\Repository\Contracts\WorkingSlotsRepositoryInterface;
use App\Repository\DepartmentRepository;
use App\Repository\DoctorRepository;
use App\Repository\DocumentRepository;
use App\Repository\NoteRepository;
use App\Repository\PatientRepository;
use App\Repository\ServicesRepository;
use App\Repository\SymptomRepository;
use App\Repository\WeekDayRepository;
use App\Repository\WorkingSlotRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
        $this->app->bind(DocumentRepositoryInterface::class, DocumentRepository::class);
        $this->app->bind(AppointmentRepositoryInterface::class, AppointmentRepository::class);
        $this->app->bind(ClinicRepositoryInterface::class, ClinicRepository::class);
        $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->bind(NoteRepositoryInterface::class, NoteRepository::class);
        $this->app->bind(ServicesRepositoryInterface::class, ServicesRepository::class);
        $this->app->bind(SymptomRepositoryInterface::class, SymptomRepository::class);
        $this->app->bind(WeekDayRepositoryInterface::class, WeekDayRepository::class);
        $this->app->bind(WorkingSlotsRepositoryInterface::class, WorkingSlotRepository::class);
    }
}
