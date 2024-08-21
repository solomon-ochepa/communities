<?php

namespace Modules\Occupant\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Occupant\database\seeders\OccupantSeeder;

class OccupantDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            OccupantSeeder::class,
        ]);
    }
}
