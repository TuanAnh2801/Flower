<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextMail extends Model
{
    protected $table = 'text_mail';
    protected $guarded = [];
    use HasFactory;
}
