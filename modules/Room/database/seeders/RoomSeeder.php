<?php

namespace Modules\Room\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Apartment\app\Models\Apartment;
use Modules\Room\App\Models\Room;
use Spatie\Permission\Models\Permission;

class RoomSeeder extends Seeder
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
            'admin.room' => collect(['index', 'show', 'create', 'edit', 'delete']),
        ]);
        foreach ($permissions as $namespace => $permission) {
            $permission->each(fn ($item) => Permission::firstOrCreate(['name' => "{$namespace}.{$item}"]));
        }

        $apartment = Apartment::first();
        $total = 4;

        for ($i = 0; $i < $total; $i++) {
            Room::firstOrCreate([
                'name' => 'Room '.$i,
                'roomable_type' => Apartment::class,
                'roomable_id' => $apartment->id,
            ]);
        }
    }
}
