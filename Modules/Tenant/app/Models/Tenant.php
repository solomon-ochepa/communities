<?php

namespace Modules\Tenant\app\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Apartment\app\Models\Apartment;
use Modules\Room\app\Models\Room;
use Modules\User\app\Models\User;

class Tenant extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['active', 'user_id', 'apartment_id', 'room_id', 'status_code'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }

    protected $casts = [
        'moved_in'  => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
