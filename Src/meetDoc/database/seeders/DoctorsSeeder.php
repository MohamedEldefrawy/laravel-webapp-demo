<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     * @author Abullah Hegab
     * @updated Mohamed Eldefrawy
     */
    public function run(): void
    {
        Doctor::factory()->times(30)->create();
    }
}
