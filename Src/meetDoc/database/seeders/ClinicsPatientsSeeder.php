<?php

namespace Database\Seeders;

use App\Models\ClinicPatient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClinicsPatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClinicPatient::factory()->times(68)->create();
    }
}
