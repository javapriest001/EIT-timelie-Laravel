<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accountant extends Model
{
    use HasFactory;
    protected $table = "accountant";
    protected $fillable =[
           'staff_id'  ,
            'date' ,
            'uploads'  ,
            'correction'  ,
            'post_utme' ,
            'printing'  ,
            'onlinereg' ,
            'validation'  ,
            'profile_crtn'  ,
            'part_time'  ,
            'opening_bal' , 
            'jamb_no'  ,
            'jamb_payall'  ,
            'jamb_remita' ,
            
            'exp_amt'  ,
            'exp_remark'  
    ];
}
