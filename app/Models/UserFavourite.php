<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavourite extends Model
{
    protected $table = 'user_favourites';

    public function user_favourite()
    {
        return $this->belongsTo(User::class);
    }

    public function product_favourite()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}