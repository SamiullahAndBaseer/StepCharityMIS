<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractType extends Model
{
    use HasFactory;

    protected $table = 'contract_types';

    protected $fillable = ['name','description'];

    /**
     * Get all of the contracts for the ContractType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts()
    {
        return $this->hasMany(Contract::class, 'contract_type_id');
    }
}
