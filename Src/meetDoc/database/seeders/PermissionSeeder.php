<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Config::get('global.permissions') as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        $clinicAdminRole = Role::create(['name' => 'ClinicAdmin']);
        $clinicStaffRole = Role::create(['name' => 'ClinicStaff']);
        $doctorRole = Role::create(['name' => 'Doctor']);
        $patientRole = Role::create(['name' => 'Patient']);
        $superAdminRole = Role::create(['name' => 'SuperAdmin']);

        foreach (Config::get('global.clinicAdminRolePermissions') as $permission) {
            $clinicAdminRole->givePermissionTo($permission);
        }
        foreach (Config::get('global.doctorRolePermissions') as $permission) {
            $doctorRole->givePermissionTo($permission);
        }
        foreach (Config::get('global.patientRolePermissions') as $permission) {
            $patientRole->givePermissionTo($permission);
        }

        foreach (Config::get('global.clinicStaffPermissions') as $permission) {
            $clinicStaffRole->givePermissionTo($permission);
        }
        foreach (Config::get('global.permissions') as $permission) {
            $superAdminRole->givePermissionTo($permission);
        }
    }
}
