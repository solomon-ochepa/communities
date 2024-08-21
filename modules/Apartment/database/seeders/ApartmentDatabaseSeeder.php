<?php

namespace Modules\Apartment\database\seeders;

use Illuminate\Database\Seeder;

class ApartmentDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                ApartmentSeeder::class,
            ]
        );
    }
}
