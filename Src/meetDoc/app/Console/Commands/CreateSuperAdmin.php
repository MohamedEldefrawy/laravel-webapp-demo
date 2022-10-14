<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class CreateSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:sudo {--email=admin@admin.com} {--password=12345678}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create super user account';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $admin = User::create([
                "email" => $this->option('email'),
                "name" => 'admin',
                "password" => Hash::make($this->option('password'))
            ])->assignRole("SuperAdmin");

            foreach (config('global.permissions') as $permission) {
                $admin->givePermissionTo($permission);
            }

        } catch (QueryException $err) {
            echo $err->getMessage();
            echo "Admin record has not been added, An error happened !!! \n";
        }

        return 0;
    }
}
