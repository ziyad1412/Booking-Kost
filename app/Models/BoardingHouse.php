<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoardingHouse extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'city_id',
        'category_id',
        'description',
        'price',
        'address'
    ];

    // Relasi ke City
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke Room
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    // Relasi ke Bonus
    public function bonuses()
    {
        return $this->hasMany(Bonus::class);
    }

    // Relasi ke Testimonial
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    // Relasi ke Transaction
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
