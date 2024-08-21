<?php

namespace Modules\AccessLog\app\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
// use Plank\Mediable\Mediable;

class AccessLog extends Model
{
    use HasFactory, HasUuids;
    // use Mediable;
    // use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['accessible_type', 'accessible_id', 'accessor_type', 'accessor_id', 'checked_in_at', 'checked_in_by', 'checked_out_at', 'checked_out_by', 'status_code'];
}
