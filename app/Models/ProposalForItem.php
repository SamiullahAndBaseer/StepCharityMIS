<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalForItem extends Model
{
    use HasFactory;

    protected $table = 'proposal_for_items';

    protected $fillable = [
        'title', 
        'description',
        'verify_by_main_branch_director', 
        'verify_by_main_branch_admin', 
        'verify_by_general_office_finance',
        'verify_by_general_office_director', 
        'upload_file', 
        'user_id'
    ];

    /**
     * Get the user that owns the ProposalForItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the quotations for the ProposalForItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quotations()
    {
        return $this->hasMany(Quotation::class, 'proposal_id');
    }
}
