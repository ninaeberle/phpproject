<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'name', 'detail', 'address', 'birthday', 'zodiacsign', 'hobbies'
    ];
}