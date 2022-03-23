<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $fillable = [
        'first_name' ,
        'surname',
        'email' ,
        'category', 
        'password' 
    ];
}