<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    protected $guarded = [];
    use HasFactory;
    protected $table = 'user_payment';
    public  function user()
    {
        return $this->belongsTo(User::class);
    }
}
