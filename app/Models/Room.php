<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['boarding_house_id', 'name', 'room_type', 'square_feet', 'capacity', 'price_per_month', 'is_available'];

    public function boardingHouse()
    {
        return $this->belongsTo(BoardingHouse::class);
    }

    //images
    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }

    //transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
