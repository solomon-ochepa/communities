<?php

namespace Modules\Room\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
