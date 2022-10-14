<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class CreateDoctor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:doctor {--email=doctor@doctor.com} {--password=12345678}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Doctor accoutn';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $doctor = User::create([
                "email" => $this->option('email'),
                "name" => 'doctor',
                "password" => Hash::make($this->option('password'))
            ])->assignRole("Doctor");

            foreach (config('global.doctorRolePermissions') as $permission) {
                $doctor->givePermissionTo($permission);
            }
        } catch (QueryException $err) {
            echo $err->getMessage();
            echo "Doctor record has not been added, An error happened !!! \n";
        }
        return 0;
    }
}
