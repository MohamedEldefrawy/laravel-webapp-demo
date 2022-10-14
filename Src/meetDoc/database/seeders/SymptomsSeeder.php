<?php

namespace Database\Seeders;

use App\Models\PatientSymptom;
use Illuminate\Database\Seeder;

class SymptomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     * @author Mohamed Eldefrawy
     */
    public function run(): void
    {
        PatientSymptom::factory()->times(10)->create();
    }
}
