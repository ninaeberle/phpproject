<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//The Model Friend shows which attributes in the database are fillable
class Friend extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'name', 'detail', 'address', 'birthday', 'zodiacsign', 'hobbies'
    ];
}