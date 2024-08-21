<?php

namespace Modules\Gatepass\app\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\AccessLog\app\Models\AccessLog;
use Modules\Status\app\Models\Status;
use Modules\Timeline\app\Models\Timeline;

// use Illuminate\Database\Eloquent\SoftDeletes;

class GatepassRequest extends Model
{
    use HasFactory, HasUuids;
    // use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['active', 'gatepass_id', 'code', 'requestable_type', 'requestable_id', 'status_code'];

    /**
     * The relationships that are eagerly loaded.
     *
     * @var array
     */
    protected $with = ['gatepass', 'timeline', 'status'];

    /**
     * Get the model that made this request
     */
    public function requestable()
    {
        return $this->morphTo();
    }

    /**
     * Get the related Gatepass model
     */
    public function gatepass()
    {
        return $this->belongsTo(Gatepass::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_code', 'code');
    }

    public function timeline()
    {
        return $this->morphMany(Timeline::class, 'timeable');
    }

    public function access_logs()
    {
        return $this->morphMany(AccessLog::class, 'accessor');
    }
}
