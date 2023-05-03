<?php

namespace Modules\Vehicle\database\seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class VehicleSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permissions
        $namespaces = collect(['admin.vehicle']);
        $permissions = collect(['index', 'show', 'create', 'edit', 'delete']);
        foreach ($namespaces as $namespace) {
            $permissions->each(fn ($permission) => Permission::firstOrCreate(['name' => "{$namespace}.{$permission}"]));
        }
    }
}
