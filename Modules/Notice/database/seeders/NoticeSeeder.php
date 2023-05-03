<?php

namespace Modules\Notice\database\seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permissions
        $namespaces = collect(['admin.notice']);
        $permissions = collect(['index', 'show', 'create', 'edit', 'delete']);
        foreach ($namespaces as $namespace) {
            $permissions->each(fn ($permission) => Permission::firstOrCreate(['name' => "{$namespace}.{$permission}"]));
        }
    }
}
