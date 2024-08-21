<?php

namespace Modules\Room\database\seeders;

use Illuminate\Database\Seeder;

class RoomDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([RoomSeeder::class]);
    }
}
