<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    

    use SoftDeletes;
  
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'room_id',
        'post_date',
        'category',
        'roomtype',
        'room_area',
        'township',
        'address',
        'price',
        'facilities',
        'description',
        'phone',
        'photo1',
        'photo2',
        'photo3',
        'photo4',
  ];



  



}
