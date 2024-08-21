<?php

namespace Modules\Menu\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MenuDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MenuSeeder::class
        ]);
    }
}
