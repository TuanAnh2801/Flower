<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    
    protected $table = 'shopping';
    protected $guarded = [];
    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
    use HasFactory;
}
