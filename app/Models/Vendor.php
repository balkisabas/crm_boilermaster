<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'name', 
        'ph_no',
        'add', 
        'reg_no',
        'web_url', 
        'fax_no',
        'email',
        'bank_name',
        'bank_acc_no',
        'swift_code',
        'doc',
        'pic',
        'status',
        'assign',
        'active_status',

    ];
}
