<?php

namespace App\Models;

use App\Models\User;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;
use Shipu\Watchable\Traits\HasAuditColumn;

class Employee extends Model
{
    use HasAuditColumn, HasRoles, Mediable;

    // protected $table = 'employees';
    protected $guarded = ['id'];
    protected $auditColumn = true;

    protected $fakeColumns = [];

    protected $casts = [
        'employed_at' => 'datetime',
    ];

    public function creator()
    {
        return $this->morphTo();
    }

    public function editor()
    {
        return $this->morphTo();
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'employee_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'employee_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_code', 'code');
    }

    // /**
    //  * @return string
    //  */
    // public function getNameAttribute()
    // {
    //     return $this->first_name . ' ' . $this->last_name;
    // }

    // public function getMyStatusAttribute()
    // {
    //     return trans('statuses.' . $this->status);
    // }

    // public function getMyGenderAttribute()
    // {
    //     return trans('genders.' . $this->gender);
    // }
}
