<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{

    protected $table = 'categories';
    protected $guarded = [];
    use HasFactory;
    public function product()
    {
        return  $this->hasMany(Product::class, 'categories');
    }
}
