<?php

namespace Modules\Like\database\seeders;

use Illuminate\Database\Seeder;

class LikeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ReactionSeeder::class,
        ]);
    }
}
