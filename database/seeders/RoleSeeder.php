<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminWeb = Role::create([
            'name' => 'super_admin',
            'guard_name' => 'web']);


        // Assign permissions to roles
        $superAdminWeb->givePermissionTo(Permission::all());

        $user = \App\Models\User::find(1);
        $user->assignRole($superAdminWeb);

    }
}
