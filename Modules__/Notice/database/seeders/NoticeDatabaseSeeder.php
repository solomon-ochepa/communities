<?php

namespace Modules\Notice\database\seeders;

use Illuminate\Database\Seeder;

class NoticeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([NoticeSeeder::class]);
    }
}
