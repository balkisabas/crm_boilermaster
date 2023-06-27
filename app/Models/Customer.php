<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Customer extends Model implements Auditable
{
    use HasFactory, AuditableTrait;
    protected $guarded = [];
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

     
    public function branches()
    {
        return $this->hasMany(branches::class);
    }
}
