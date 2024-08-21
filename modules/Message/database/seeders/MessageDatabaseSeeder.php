<?php

namespace Modules\Message\database\seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

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
