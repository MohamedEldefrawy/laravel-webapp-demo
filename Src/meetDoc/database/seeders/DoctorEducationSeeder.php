<?php

namespace Database\Seeders;

use App\Models\DoctorEducation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DoctorEducation::factory()->times(10)->create();
    }
}
