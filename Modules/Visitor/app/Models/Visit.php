<?php

namespace Modules\Visitor\app\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Activity\app\Models\Activity;

class Visit extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['visitor_id', 'visitable_type', 'visitable_id'];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

    public function activities()
    {
        return $this->morphMany(Activity::class, 'activitable');
    }
}
