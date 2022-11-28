<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remittance extends Model
{
    use HasFactory;

    protected $table = 'remittances';

    protected $fillable = [
        'date_of_remittance', 
        'date_of_receive', 
        'remittance_number', 
        'amount',
        'status',
        'currency_id', 
        'receiver_id', 
        'sender_id'
    ];

    /**
     * Get the senderUser that owns the Remittance
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function senderUser()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * Get the receiverUser that owns the Remittance
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receiverUser()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    /**
     * Get the currency that owns the Remittance
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
