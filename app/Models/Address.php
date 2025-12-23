<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable=['user_id','type','first_name','last_name','company','phone','address1','address2','city','state_or_province','postal_code','country_code'];

    public function order(){
        return $this->hasOne(Order::class);
    }
}
