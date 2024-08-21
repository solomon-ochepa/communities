<?php

namespace Modules\Occupant\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class OccupantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permissions
        $permissions = collect([
            'occupants.admin' => collect(['list', 'show', 'create', 'edit', 'delete'])
        ]);

        foreach ($permissions as $namespace => $permission) {
            $permission->each(fn ($item) => Permission::firstOrCreate(['name' => "{$namespace}.{$item}"]));
        }
    }
}
