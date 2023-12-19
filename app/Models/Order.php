<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = [];
    use HasFactory;
    public function OrderItems(){
        return $this->hasMany(OrderItems::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'order_id');
    }
    public function Shopping()
    {
        return $this->hasMany(Shopping::class,'order_id');
    }
    
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
    public function delivery()
    {
        return $this->hasMany(Delivery::class,'order_id');
    }
}
