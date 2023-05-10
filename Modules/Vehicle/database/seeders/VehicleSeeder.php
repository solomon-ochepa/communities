<?php

namespace Modules\Vehicle\database\seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permissions
        $permissions = collect([
            'admin.vehicle' => collect(['index', 'show', 'create', 'edit', 'delete'])
        ]);
        foreach ($permissions as $namespace => $permission) {
            $permission->each(fn ($item) => Permission::firstOrCreate(['name' => "{$namespace}.{$item}"]));
        }
    }
}
