<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable=['fullname','phone_number','email','order_number','company_name','rma_number','comments'];
    public $timestamps=false;
    protected $table='contacts';
}
