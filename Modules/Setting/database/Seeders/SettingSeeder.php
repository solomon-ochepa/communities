<?php

namespace Modules\Setting\database\Seeders;

use Modules\Setting\app\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permissions
        $permissions = collect([
            'admin.setting' => collect(['index', 'show', 'create', 'edit', 'delete'])
        ]);
        foreach ($permissions as $namespace => $permission) {
            $permission->each(fn ($item) => Permission::firstOrCreate(['name' => "{$namespace}.{$item}"]));
        }

        foreach (config()->all() as $key => $config) {
            foreach ($config as $name => $value) {
                Setting::firstOrCreate([
                    'name'      => Str::title("$key $name"),
                    'value'     => config(Str::slug("$key $name")),
                    'config'    => 'app.name'
                ]);
            }
        }
    }
}
