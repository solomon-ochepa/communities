<?php

namespace Modules\Contact\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Contact\app\Models\Contact;
use Modules\User\app\Models\User;

class ContactSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach ($users as $user) {
            Contact::firstOrCreate(['user_id' => $user->id]);
        }
    }
}
