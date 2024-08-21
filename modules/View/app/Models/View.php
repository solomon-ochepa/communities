<?php

namespace Modules\View\app\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'read', 'views', 'viewable_type', 'viewable_id'];

    /**
     * undocumented function summary
     **/
    public function viewable()
    {
        return $this->morphTo();
    }
}
