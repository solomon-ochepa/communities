<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $guarded = ['id'];
    protected $fakeColumns = [];
    public $timestamps = false;

    protected $fillable = [
        'name', 'status'
    ];
}
