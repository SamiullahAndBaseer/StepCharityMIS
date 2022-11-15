<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaktobType extends Model
{
    use HasFactory;

    protected $table = 'maktob_types';

    protected $fillable = ['name', 'description'];

    /**
     * Get all of the Maktob for the MaktobType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Maktob()
    {
        return $this->hasMany(Maktob::class, 'maktob_type_id');
    }
}
