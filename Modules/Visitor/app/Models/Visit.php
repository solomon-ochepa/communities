<?php

namespace Modules\Visitor\app\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Status\app\Models\Status;
use Modules\Timeline\app\Models\Timeline;

class Visit extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['active', 'visitor_id', 'reason', 'note', 'requested_by', 'approved_by', 'arrived_at', 'expired_at', 'checked_in_at', 'checked_out_at', 'visitable_type', 'visitable_id', 'status_code'];

    protected $casts = [
        'arrived_at'    => 'datetime',
        'expired_at'    => 'datetime'
    ];

    public function visitable()
    {
        return $this->morphTo();
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_code', 'code');
    }

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

    public function timelines()
    {
        return $this->morphMany(Timeline::class, 'timeable');
    }
}
