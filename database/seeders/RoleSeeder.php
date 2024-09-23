<?php

namespace Database\Seeders;

use App\Models\User;
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
        Role::create([
            'name' => 'super_admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'super_admin',
            'guard_name' => 'api'
        ]);

        Role::create([
            'name' => 'panel_user',
            'guard_name' => 'api'
        ]);
        Role::create([
            'name' => 'panel_user',
            'guard_name' => 'web'
        ]);


        $user = User::create([
            'email' => 'superuser@example.com',
            'password' => 'user_password',
            'name'=>'Super Admin',
            'username'=>'i_am_super',
            'profile_picture' => 'https://cataas.com/cat?type=medium'
        ]);
        $user->assignRole('super_admin');

    }
}
