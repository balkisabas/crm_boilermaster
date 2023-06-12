<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personincharge extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'fk', 
        'name',
        'phn_no', 
        'email',
        'Designation', 
        'fax_no',
        'assign',
        'status',
        'active_status',
 
    ];
}
