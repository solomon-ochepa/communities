<?php

namespace Modules\Address\app\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasUuids;

    protected $fillable = [
        'description', 'number', 'street', 'area', 'town', 'city', 'state', 'country',
    ];

    public function address(): Attribute
    {
        return Attribute::get(function ($value, $attributes) {
            $address = '';
            $address .= $attributes['number'] ? $attributes['number'].' ' : '';
            $address .= $attributes['description'] ? $attributes['description'].' ' : '';
            $address .= $attributes['area'] ? ' ('.$attributes['area'].')' : '';

            $address .= $address ? ', ' : '';
            $address .= $attributes['city'].', '.$attributes['state'].', '.$attributes['country'].'.';

            return $address;
        });
    }
}
