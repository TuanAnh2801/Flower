<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;

    protected $guarded = [];
   
    protected $table ='categoriesposts';
    public function posts()
    {
        return $this->hasMany(Posts::class, 'category_id');
        // return $this->belongsToMany(Posts::class);
    }
}
