<?php

namespace Modules\GatePass\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GatepassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gatepasses = [
            [
                'user_id'   => ''
            ]
        ];

        foreach ($gatepasses as $key => $gatepass) {
            # code...
        }
    }
}
