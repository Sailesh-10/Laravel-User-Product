<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'weight', 'stock', 'type'];
    public function favourites()
    {
        $this->hasMany(UserFavourite::class);
    }
    use HasFactory;
}