<?php

namespace Modules\Contact\database\seeders;

use Illuminate\Database\Seeder;

class ContactDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([ContactSeederTableSeeder::class]);
    }
}
