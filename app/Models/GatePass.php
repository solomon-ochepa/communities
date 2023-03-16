<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Concerns\HasUuid;

class GatePass extends Model
{
    use HasFactory, HasUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'staff_id', 'visitor_id', 'resident_id'
    ];

    public function staff()
    {
        # code...
    }

    public function visitor()
    {
        # code...
    }

    public function visiting()
    {
        # code...
    }
}
