<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'method',
        'status',
        'transaction_id',
        'card_last4',
        'card_brand',
        'paid_at',
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
