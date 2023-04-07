<?php

namespace Modules\Room\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Apartment\app\Models\Apartment;
use Modules\Room\app\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartment = Apartment::first();
        $total = 4;

        for ($i = 0; $i < $total; $i++) {
            Room::firstOrCreate([
                'name'          => 'Room ' . $i,
                'roomable_type' => Apartment::class,
                'roomable_id'   => $apartment->id
            ]);
        }
    }
}
