<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maktob extends Model
{
    use HasFactory;

    protected $table = 'maktobs';

    protected $fillable = ['title', 'description', 'status', 'reference_to', 'images', 'maktob_type_id'];

    /**
     * Get the maktobType that owns the Maktob
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function maktobType()
    {
        return $this->belongsTo(MaktobType::class);
    }
}
