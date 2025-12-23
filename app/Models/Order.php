<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'user_id',
        'shipping_address_id',
        'billing_address_id',
        'payment_method',
        'order_comment',
        'subtotal',
        'shipping_cost',
        'tax',
        'total'  
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function address(){
        return $this->belongsTo(Address::class,'shipping_address_id');
    }

    public function items(){
        return $this->hasMany(OrderItem::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
