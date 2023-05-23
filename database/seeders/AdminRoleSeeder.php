<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class AdminRoleSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::findOrCreate('admin', 'web');

        // Assign the 'access-cruds' permission to the 'admin' role
        $adminRole->givePermissionTo('access-cruds');

        // Find the user by username
        $user = User::where('username', 'sigisdviratis')->first();

        if (!$user) {
            // If the user with the username "sigisdviratis" doesn't exist, find the user by email
            $user = User::where('email', 'sigisdviratis@sigisdviratis.com')->first();
        }

        if ($user) {
            if (!$user->hasRole('admin')) {
                $user->assignRole($adminRole);
            }
        }
    }
}
