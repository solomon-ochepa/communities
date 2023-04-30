<?php

namespace Modules\GatePass\app\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class Gatepass extends Model
{
    use HasFactory, HasUuids, Mediable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['active', 'visit_id', 'code', 'checked_in_at', 'checked_in_by', 'checked_out_at', 'checked_out_by', 'checkpoint_id', 'status_code'];
}
