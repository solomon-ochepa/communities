<?php

namespace Modules\User\app\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Tenant\app\Models\Tenant;
use Plank\Mediable\Mediable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Mediable, HasRoles, SoftDeletes, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guard_name = 'web';

    /**
     * Get user full name
     */
    public function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['first_name'] . ' ' . $attributes['last_name'],
            // set: fn ($value, $attributes) => ''
        );
    }

    // Tenancies
    public function tenancies()
    {
        return $this->hasMany(Tenant::class);
    }
}
