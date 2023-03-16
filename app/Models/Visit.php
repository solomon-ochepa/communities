<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Concerns\HasUuid;

class Visit extends Model
{
    use HasFactory, HasUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'visitor_id', 'resident_id', 'visiting_at', 'departed_at'
    ];

    public function visitor()
    {
        # code...
    }

    public function visit()
    {
        # code...
    }
}
