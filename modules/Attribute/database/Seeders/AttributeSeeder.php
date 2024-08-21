<?php

namespace Modules\Attribute\database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Attribute\app\Models\Attribute;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = [
            ['name' => 'SqFt', 'description' => 'Square feets'],
            ['name' => 'Bed', 'description' => 'Bedrooms'],
            ['name' => 'Bath', 'description' => 'Bathrooms'],
            ['name' => 'Garage', 'description' => 'Garage space'],
        ];

        foreach ($attributes as $attribute) {
            Attribute::firstOrCreate($attribute);
        }
    }
}
