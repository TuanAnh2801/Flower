<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function product()
    {
        return $this->hasMany(Product::class, 'inventory_id');
    }
}
