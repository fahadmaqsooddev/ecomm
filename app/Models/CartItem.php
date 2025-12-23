<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable=['product_id','user_id','quantity'];


    // In your CartItem model
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
