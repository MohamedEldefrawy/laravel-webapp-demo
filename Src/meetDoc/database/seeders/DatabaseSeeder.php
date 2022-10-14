<?php

namespace Database\Seeders;

use App\Models\DayWeek;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PatientsSeeder::class);
        $this->call(ClinicsSeeder::class);
        $this->call(ClinicsPatientsSeeder::class);
        $this->call(SymptomsSeeder::class);
        $this->call(DepartmentsSeeder::class);
        $this->call(StatusesSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(DoctorsSeeder::class);
        $this->call(WeeksDaysSeeder::class);
        $this->call(DoctorsServicesSeeder::class);
        $this->call(AppointmentsSeeder::class);
        $this->call(NoteSeeder::class);
        $this->call(WorkingSLotsSeeder::class);
        $this->call(DoctorEducationSeeder::class);
        $this->call(DoctorExperienceSeeder::class);
        $this->call(DoctorCertificateSeeder::class);

    }
}
