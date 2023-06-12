<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'pic',
        'type',
        'cust_name',
        'cust_pic',
        'cust_email',
        'rfq_no',
        'rfq_title',
        'due_date',
        'final_pricing',
        'rfq_status',
        'cust_po_no',
        'date_award',
        'award_amount'
    ];

    public function proposalDoc()
    {
        return $this->hasMany(ProposalDoc::class, 'rfqid', 'id');
    }
}
