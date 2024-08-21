<?php

namespace Modules\Tenant\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class TenantSeeder extends Seeder
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
            'admin.tenant' => collect(['index', 'show', 'create', 'edit', 'delete'])
        ]);
        foreach ($permissions as $namespace => $permission) {
            $permission->each(fn ($item) => Permission::firstOrCreate(['name' => "{$namespace}.{$item}"]));
        }
    }
}
