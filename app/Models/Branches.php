<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;


class branches extends Model implements Auditable
{
    use HasFactory, AuditableTrait;

    protected $guarded = [];

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
