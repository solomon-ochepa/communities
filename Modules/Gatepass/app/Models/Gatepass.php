<?php

namespace Modules\Gatepass\app\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\AccessLog\app\Models\AccessLog;
use Modules\Category\app\Models\Categorizable;
use Modules\Category\app\Models\Category;
use Modules\Status\app\Models\Status;
use Plank\Mediable\Mediable;

class Gatepass extends Model
{
    use HasFactory, HasUuids, Mediable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['active', 'code', 'model_type', 'model_id', 'status_code'];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_code', 'code');
    }

    public function access_logs()
    {
        return $this->morphMany(AccessLog::class, 'accessible');
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function categorizables()
    {
        return $this->morphMany(Categorizable::class, 'categorizable');
    }

    public function user()
    {
        return $this->morphTo('model');
    }
}
