<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branches extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'parent_id', 
        'name',
        'add',
        'pic', 
        'email',
        'phn_no', 
        'fax_no',
        'active',
        'status',
        'parent',
        'Active_status',
        
    ];


    public function customer()
    {
        return $this->belongsTo(customer::class);
    }
}      
