<?php

namespace Modules\Status\database\Seeders;

use Modules\Status\app\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permissions
        $namespaces = collect(['admin.status']);
        $permissions = collect(['index', 'show', 'create', 'edit', 'delete']);
        foreach ($namespaces as $namespace) {
            $permissions->each(fn ($permission) => Permission::firstOrCreate(['name' => "{$namespace}.{$permission}"]));
        }

        $statuses = [
            [
                'name'  => 'Cancelled',
                'code'  => 0,
                'color' => 'text-muted',
                'icon'  => 'fas fa-times',
            ],
            [
                'name'  => 'Pending',
                'code'  => 1,
                'color' => 'text-primary',
                'icon'  => 'fas fa-rotate',
            ],
            [
                'name'  => 'Processing',
                'code'  => 2,
                'color' => 'text-primary',
                'icon'  => 'fas fa-rotate fa-spin',
            ],
            [
                'name'  => 'Approved',
                'code'  => 3,
                'color' => 'text-success',
                'icon'  => 'fas fa-check',
            ],
        ];

        foreach ($statuses as $status) {
            $status = Status::firstOrCreate([
                'name' => $status['name']
            ], Arr::except($status, 'name'));
        }
    }
}
