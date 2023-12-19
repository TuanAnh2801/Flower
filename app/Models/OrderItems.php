<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $guarded = [];
    protected $table = 'order_items';
    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
    use HasFactory;
}
