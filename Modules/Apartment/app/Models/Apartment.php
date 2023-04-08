<?php

namespace Modules\Apartment\app\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Room\app\Models\Room;
use Modules\Tenant\app\Models\Tenant;
use Modules\Visitor\app\Models\Visit;
use Modules\Visitor\app\Models\Visitor;

class Apartment extends Model
{
    use HasFactory, HasUuids, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'active'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function rooms()
    {
        return $this->morphMany(Room::class, 'roomable');
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    // public function visitors() //morph
    // {
    //     return $this->hasManyThrough(Visitor::class, Room::class);
    // }

    public function visits() // morph
    {
        return $this->hasManyThrough(Visit::class, Room::class);
    }
}
