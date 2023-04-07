<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

// use Illuminate\Database\Eloquent\Casts\Attribute;
// use Illuminate\Database\Eloquent\Concerns\HasUuids;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
use Modules\User\app\Models\User as ModulesUser;
// use Plank\Mediable\Mediable;
// use Spatie\Permission\Traits\HasRoles;

class User extends ModulesUser
{
    // use HasApiTokens, HasFactory, Notifiable, Mediable, HasRoles, SoftDeletes, HasUuids;

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
}
