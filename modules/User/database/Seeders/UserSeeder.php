<?php

namespace Modules\User\database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\User\app\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = '$1Password;';

        $users = [
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'username' => 'admin',
                'phone' => '2340000000000',
                'email' => 'admin@example.com',
                'password' => Hash::make($password),
            ],
            [
                'first_name' => 'Demo',
                'last_name' => 'User',
                'username' => 'user',
                'phone' => '2340000000001',
                'email' => 'user@example.com',
                'password' => Hash::make($password),
            ],
        ];

        foreach ($users as $user) {
            $exists = User::whereUsername($user['username'])->count();
            if (! $exists) {
                $user = User::firstOrCreate(['username' => $user['username']], $user); // Create User

                // Create: Role
                $role = Role::firstOrCreate(['name' => $user->username]);
                $user->assignRole($role->name);
            }
        }

        // Permissions
        $permissions = collect([
            'admin.user' => collect(['index', 'show', 'create', 'edit', 'delete']),
        ]);
        foreach ($permissions as $namespace => $permission) {
            $permission->each(fn ($item) => Permission::firstOrCreate(['name' => "{$namespace}.{$item}"]));
        }
    }
}
