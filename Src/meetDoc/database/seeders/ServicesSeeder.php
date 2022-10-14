<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class servicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'name'=> 'Home Session',
            'created_by'=>'1',
        ]);
        Service::create([
            'name'=> 'onsite Session',
            'created_by'=>'1',
        ]);
        Service::create([
            'name'=> 'video Session',
            'created_by'=>'1',
        ]);
    }
}
