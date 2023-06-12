<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalDoc extends Model
{
    use HasFactory;
    protected $fillable = [
        'document_name',
        'document_type',
        'filename'
    ];

    public function proposal()
    {
        return $this->hasMany(Proposal::class);
    }
}
