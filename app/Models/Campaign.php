<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table ='campaign';
    public function Order()
    {
        return $this->hasMany(Order::class,'campaign_id');
    }
}