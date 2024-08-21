<?php

namespace Modules\Like\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Like\app\Models\Reaction;

class ReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reactions = [
            ['name' => 'Like', 'icon' => 'f164', 'emoji' => 'U+1F44D'],
            ['name' => 'Dislike', 'icon' => 'f165', 'emoji' => 'U+1F44E'],
            ['name' => 'Love', 'icon' => 'f004', 'emoji' => 'U+2764'],
            ['name' => 'Haha', 'icon' => 'f588', 'emoji' => 'U+1F923'],
            ['name' => 'Wow', 'icon' => 'e37b', 'emoji' => 'U+1F62E'],
            ['name' => 'Sad', 'icon' => 'e38a', 'emoji' => 'U+1F622'],
            ['name' => 'Angry', 'icon' => 'f556', 'emoji' => 'U+1F620'],
        ];

        foreach ($reactions as $reaction) {
            Reaction::firstOrCreate($reaction);
        }
    }
}
