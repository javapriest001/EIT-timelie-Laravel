<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deskOfficer extends Model
{
    use HasFactory;
    protected $table ='desk_officer';
    protected $fillable =[
        
        'staff_id',
        'date',
        'uploads',
        'corrections',
        'post_utme',
        'printing',
        'online_reg',
        'validation',
        'profile_crtn',
        'part_time'
    ];
}
