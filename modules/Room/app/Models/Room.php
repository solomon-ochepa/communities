<?php

namespace Modules\Room\app\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Status\app\Models\Status;
use Modules\Tenant\app\Models\Tenant;
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

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_code', 'code');
    }

    public function roomable()
    {
        return $this->morphTo();
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
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
