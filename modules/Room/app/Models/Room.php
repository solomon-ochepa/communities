<?php

namespace Modules\Room\App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Occupant\App\Models\Occupant;
use Modules\Status\app\Models\Status;
use Modules\Visitor\app\Models\Visit;
use Modules\Visitor\app\Models\Visitor;

class Room extends Model
{
    use HasFactory, HasUuids, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['active', 'name', 'slug', 'roomable_type', 'roomable_id', 'status_code', 'created_at'];

    /**
     * Return the sluggable configuration array for this model.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
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

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_code', 'code');
    }

    public function roomable()
    {
        return $this->morphTo();
    }

    public function occupants()
    {
        return $this->hasMany(Occupant::class);
    }

    public function visitors()
    {
        return $this->hasMany(Visitor::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
