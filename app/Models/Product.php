<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'price' => 'float',
    ];

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }


    public function images()
    {
        return $this->hasMany(Images::class);
    }

    public function favorite()
    {
        return $this->hasOne(Favorites::class);
    }


}
