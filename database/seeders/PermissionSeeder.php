<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // settings
            'settings',
            'settings.index',
            'settings.show',
            'settings.create',
            'settings.update',
            'settings.delete',
            // roles
            'roles',
            'roles.index',
            'roles.show',
            'roles.create',
            'roles.update',
            'roles.delete',
            // permissions
            'permissions',
            'permissions.index',
            'permissions.show',
            'permissions.create',
            'permissions.update',
            'permissions.delete',
            // users
            'users',
            'users.index',
            'users.show',
            'users.create',
            'users.update',
            'users.update.self',
            'users.delete',
            // statuses
            'statuses',
            'statuses.index',
            'statuses.show',
            'statuses.create',
            'statuses.update',
            'statuses.delete',
        ];

        foreach ($permissions as $value) {
            Permission::firstOrCreate([
                'name' => $value,
            ]);
        }
    }
}
