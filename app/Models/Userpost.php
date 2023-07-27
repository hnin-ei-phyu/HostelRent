<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userpost extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'username',
        'useremail',
        'userphoto',
        'category',
        'room_type',
        'location',
        'price',
        'post_date',
        'phone',
    ];
}
