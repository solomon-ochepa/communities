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
        $permissions = collect([
            'admin.notice' => collect(['index', 'show', 'create', 'edit', 'delete']),
        ]);
        foreach ($permissions as $namespace => $permission) {
            $permission->each(fn ($item) => Permission::firstOrCreate(['name' => "{$namespace}.{$item}"]));
        }
    }
}
