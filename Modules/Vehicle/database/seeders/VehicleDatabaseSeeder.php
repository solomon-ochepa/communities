<?php

namespace Modules\Vehicle\database\seeders;

use Illuminate\Database\Seeder;

class VehicleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([VehicleSeederTableSeeder::class]);
    }
}
