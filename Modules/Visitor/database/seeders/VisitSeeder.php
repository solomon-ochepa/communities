<?php

namespace Modules\Visitor\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permissions
        $namespaces = collect(['admin.visit']);
        $permissions = collect(['index', 'show', 'create', 'edit', 'delete']);
        foreach ($namespaces as $namespace) {
            $permissions->each(fn ($permission) => Permission::firstOrCreate(['name' => "{$namespace}.{$permission}"]));
        }
    }
}
