<?php

namespace Modules\GatepassRequest\app\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Gatepass\app\Models\Gatepass;
use Modules\Status\app\Models\Status;

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
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'code';
    }

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
}
