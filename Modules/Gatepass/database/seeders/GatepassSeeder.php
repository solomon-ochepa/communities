<?php

namespace Modules\Gatepass\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Gatepass\app\Models\Gatepass;
use Modules\User\app\Models\User;
use Illuminate\Support\Str;
use Modules\Category\app\Models\Categorizable;
use Modules\Category\app\Models\Category;
use Plank\Mediable\Facades\MediaUploader;

class GatepassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users
        $users = User::all();

        foreach ($users as $user) {
            $gatepass = Gatepass::where(['model_type' => get_class($user), 'model_id' => $user->id])->first();
            if (!$gatepass) {
                $code = $user->nin ?? $user->phone ?? Str::random(11);
                while (Gatepass::whereCode($code)->first()) {
                    $code = $user->nin ?? $user->phone ?? Str::random(11);
                }

                $gatepass = Gatepass::firstOrCreate([
                    'model_type'    => get_class($user),
                    'model_id'      => $user->id,
                ], [
                    'code'  => str_ireplace([' ', '-', ',', '.', '+'], '', $code),
                ]);
            }

            // Category
            // user [tenant, visitor, driver], guest [...]
            $category_name = Str::afterLast(get_class($user), '\\');
            $category = Category::firstOrCreate([
                'name'  => $category_name
            ]);

            Categorizable::firstOrCreate([
                'category_id'           => $category->id,
                'categorizable_type'    => get_class($gatepass),
                'categorizable_id'      => $gatepass->id
            ]);

            // Barcode
            $barcode = barcode($gatepass->code, "{$gatepass->code}", 'ean-128', [
                'f' => 'svg', 'h' => '32px'
            ]);
            $media = MediaUploader::fromString($barcode)
                ->useFilename($gatepass->code)
                ->toDirectory('images/gatepass/barcode')
                // ->useHashForFilename()
                ->upload();

            $gatepass->syncMedia($media, ['barcode']);
        }
    }
}
