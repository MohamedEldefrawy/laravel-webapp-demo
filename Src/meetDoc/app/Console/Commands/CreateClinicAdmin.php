<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class CreateClinicAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:clinicAdmin {--email=clinic.clinic@admin.com} {--password=12345678}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Clinic admin user with clinic.admin@admin.com and default pw 12345678 if not provided in the command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $clinicAdmin = User::create([
                "email" => $this->option('email'),
                "name" => 'clinic',
                "password" => Hash::make($this->option('password'))
            ])->assignRole("ClinicAdmin");

            foreach (config('global.clinicAdminRolePermissions') as $permission) {
                $clinicAdmin->givePermissionTo($permission);
            }
        } catch (QueryException $err) {
            echo $err->getMessage();
            echo "Clinic Admin record has not been added, An error happened !!! \n";
        }
        return 0;
    }
}
