<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class utility extends Model
{
    use HasFactory;
    protected $table ='utility';
    protected $fillable =[
        
        'staff_id',
        'date',
        'general_issue',
        'general_comments',
        'general_status',
        'general_location',
        'mower_issue',
        'mower_comment',
        'mower_status',
        'mower_size',
        'generator_issue', 
        'generator_comment',
        'generator_size',
        'generator_status',
        'ups_issue',
        'ups_comment',
        'fuel_type',
        'fuel_liters'
    ];

}
