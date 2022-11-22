<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $table = 'contracts';

    protected $fillable = ['description', 'start_date', 'end_date', 'user_id', 'contract_type_id'];

    /**
     * Get the contract_type that owns the Contract
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contract_type()
    {
        return $this->belongsTo(ContractType::class);
    }

    /**
     * Get the user that owns the Contract
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
