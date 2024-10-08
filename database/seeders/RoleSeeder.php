<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin', 'user',
        ];

        foreach ($roles as $value) {
            $role = Role::firstOrCreate([
                'name' => $value,
            ]);
        }
    }
}
