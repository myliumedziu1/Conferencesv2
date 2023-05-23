<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CrudsPermissionSeeder extends Seeder
{
    public function run()
    {
        $permission = Permission::firstOrCreate(['name' => 'access-cruds']);
    }
}
