<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaserpost extends Model
{
    use HasFactory;
    protected $fillable = [
        'leaser_id',
        'leasername',
        'leaseremail',
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

  public function comments()
  {
      return $this->hasMany(Comment::class)->whereNull('parent_id');
  }
}
