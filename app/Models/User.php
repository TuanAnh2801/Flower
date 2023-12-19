<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'user_name',
    //     'email',
    //     'password',
    //     'last_name',
    //     'first_name',
    //     'role'
    // ];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
    public function userAddress()
    {
        return $this->hasOne(UserAddress::class,'user_id');
    }
    public function Order()
    {
        return $this->hasMany(Order::class, 'order_id');
    }
    public function userPayment()
    { 
        return $this->hasMany(UserPayment::class ,'user_id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class,'user_id');
    }
}
