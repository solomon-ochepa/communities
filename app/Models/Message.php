<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Concerns\HasUuid;

class Message extends Model
{
    use HasFactory, HasUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'sender_id', 'receiver_id', 'subject', 'body', 'messagable'
    ];

    public function sender()
    {
        # code...
    }

    public function receiver()
    {
        # code...
    }
}
