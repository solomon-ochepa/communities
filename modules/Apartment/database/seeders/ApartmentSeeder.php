<?php

namespace Modules\Apartment\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Apartment\app\Models\Apartment;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = [
            [
                'name' => 'Block A',
            ],
        ];

        foreach ($apartments as $key => $apartment) {
            Apartment::firstOrCreate($apartment);
        }
    }
}
