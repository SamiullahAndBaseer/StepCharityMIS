<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $table = 'quotations';

    protected $fillable = [
        'name',
        'price',
        'quality',
        'bill_image',
        'discount',
        'status_for_buying',
        'general_office_status',
        'financial_status_afg',
        'currency_id',
        'proposal_id'
    ];

    /**
     * Get the proposalItem that owns the Quotation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proposalItem()
    {
        return $this->belongsTo(ProposalForItem::class, 'proposal_id');
    }

    /**
     * Get the currency that owns the Quotation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
