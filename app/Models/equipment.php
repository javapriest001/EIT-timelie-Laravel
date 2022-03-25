<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipment extends Model
{
    protected $table = 'equipments';
    protected $fillable = [

        'equipment'
        
    ];
    use HasFactory;
}
