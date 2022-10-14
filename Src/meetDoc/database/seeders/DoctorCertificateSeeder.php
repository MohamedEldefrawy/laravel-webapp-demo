<?php

namespace Database\Seeders;

use App\Models\DoctorCertificate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorCertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DoctorCertificate::factory()->times(10)->create();
    }
}
