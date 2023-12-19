<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'delivery';
    protected $guarded = [];
      public function Order()
    { 
      // return $this->hasMany(OrderItem::class);
        return $this->belongsTo(Order::class);
       
    }
}
