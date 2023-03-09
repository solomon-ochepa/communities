<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => 'Cancelled', 'code' => 0],
            ['name' => 'Pending', 'code' => 1],
            ['name' => 'Processing', 'code' => 2],
            ['name' => 'Processed', 'code' => 3],
            ['name' => 'Active', 'code' => 4]
        ];

        foreach ($statuses as $key => $status) {
            $status = Status::firstOrCreate([
                'name' => $status['name'], 'code' => $status['code']
            ], []);
        }
    }
}
