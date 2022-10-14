<?php

namespace Database\Seeders;

use App\Models\DoctorService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorsServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DoctorRepository::factory()->times(10)->create();
        DoctorService::create([
            'service_id'=> '1',
            'doctor_id'=>'1',
        ]);
        DoctorService::create([
            'service_id'=> '2',
            'doctor_id'=>'1',
        ]);
        DoctorService::create([
            'service_id'=> '3',
            'doctor_id'=>'1',
        ]);
        DoctorService::create([
            'service_id'=> '1',
            'doctor_id'=>'2',
        ]);
        DoctorService::create([
            'service_id'=> '2',
            'doctor_id'=>'2',
        ]);
        DoctorService::create([
            'service_id'=> '3',
            'doctor_id'=>'2',
        ]);
        DoctorService::create([
            'service_id'=> '1',
            'doctor_id'=>'3',
        ]);
        DoctorService::create([
            'service_id'=> '2',
            'doctor_id'=>'3',
        ]);
        DoctorService::create([
            'service_id'=> '3',
            'doctor_id'=>'3',
        ]);
        DoctorService::create([
            'service_id'=> '1',
            'doctor_id'=>'4',
        ]);
    }
}
