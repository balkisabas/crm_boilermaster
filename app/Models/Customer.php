<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    protected $fillable = [ 
        'name', 
        'ph_no',
        'add', 
        'reg_no',
        'web_url', 
        'fax_no',
        'pic',
        'doc',
        'status' 
    ];

}
