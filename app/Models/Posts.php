<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $guarded = [];
    protected $casts = [
        'img' => 'json',
    ];
    protected $table ='posts';
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(CategoryPost::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
