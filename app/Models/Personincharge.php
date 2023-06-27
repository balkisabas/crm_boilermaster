<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Personincharge extends Model implements Auditable
{
    use HasFactory, AuditableTrait;
    protected $guarded = [];
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
