<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     * @author Mohamed Eldefrawy
     */
    public function run(): void
    {
        $admin = User::UpdateOrCreate(['email' => 'admin@admin.com'], [
            'name' => 'admin',
            'email' => 'abdallahhegab192@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $admin->assignRole('SuperAdmin');

        User::factory()->times(100)->create();
    }
}
