<?php

namespace Modules\Address\app\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Addressable extends Model
{
    use HasUuids;

    protected $fillable = [
        'address_id', 'addressable_type', 'addressable_id'
    ];
}
