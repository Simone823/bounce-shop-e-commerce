<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // fillable
    protected $fillable = [
        'guest_name',
        'guest_email',
        'guest_address',
        'guest_phone',
        'guest_message'
    ];
}
