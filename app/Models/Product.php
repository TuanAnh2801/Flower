<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','desc','img','price','category_id','inventory_id','telephone'];
    // protected $guarded = [];

    protected $attribute = [
        'img' => '[]'
    ];

    protected $casts = [
        'img' => 'array'
    ];

    protected $table = 'products';
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
    // public function getThumbnailAttribute()
    // {
    //     if (count($this->img) > 0) {
    //         return $this->img[0];
    //     }
    //     return "";
    // }
    public function comment()
    {
        return $this->hasMany(Comment::class,'product_id');
    }
}
