<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function products(){
        return $this->hasMany(Product::class);
    }

    // Accessor for the name attribute
    public function getNameAttribute($value)
    {
        return ucwords($value); // Capitalizes the first letter of each word
    }
}
