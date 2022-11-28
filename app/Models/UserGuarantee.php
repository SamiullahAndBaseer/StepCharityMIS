<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGuarantee extends Model
{
    use HasFactory;

    protected $table = 'user_guarantees';

    protected $fillable = [
        'first_name', 
        'last_name', 
        'father_name',
        'gender',
        'email',
        'phone_number',
        'whatsapp',
        'id_card_number',
        'DoB',
        'original_address',
        'current_address',
        'photo',
        'description', 
        'user_id', 
        'survey_id', 
        'relation'
    ];

    /**
     * Get the user associated with the UserGuarantee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * Get the survey that owns the UserGuarantee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
