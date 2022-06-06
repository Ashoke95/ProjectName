<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact1 extends Model
{
    use HasFactory;

    protected $table = 'contact1s';
  
    protected $fillable = ['name', 'email', 'subject','phone_number','user_message'];
}
