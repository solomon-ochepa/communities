<?php

namespace Modules\Checkpoint\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Modules\Checkpoint\app\Models\Checkpoint;

class CheckpointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $checkpoints = [
            [
                'name' => 'Main Gate',
                'default' => 1
            ],
            [
                'name' => 'East Wing Gate',
            ],
            [
                'name' => 'West Wing Gate',
            ],
        ];

        foreach ($checkpoints as $checkpoint) {
            Checkpoint::firstOrCreate(Arr::only($checkpoint, 'name'), $checkpoint);
        }
    }
}
