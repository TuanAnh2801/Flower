<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $guarded = [];
    protected $table = 'user_address';
    use HasFactory;
    
    public function user()
    {

        return $this->belongsTo(User::class);
    }
}
