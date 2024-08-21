<?php

namespace Modules\Message\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MessageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call([MessageSeeder::class]);
    }
}
