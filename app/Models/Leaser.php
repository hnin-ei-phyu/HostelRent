<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaser extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'full_name',
        'phone',
        'birthday',
        'country',
        'state',
        'address',
        'photo',
        'google_id',
        'facebook_id',
    ];



}
