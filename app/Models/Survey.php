<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $table = 'surveys';

    protected $fillable = [
        'first_name',
        'last_name',
        'father_name',
        'primary_phone_number',
        'whatsapp_number',
        'id_card_number',
        'gender',
        'marital_status',
        'date_of_birth',
        'branch_id',
        'email',
        'photo',
        'mosque_name',
        'description',
        'original_location',
        'current_location',
        'question_one',
        'question_two',
        'question_three',
        'question_four',
        'status',
        'course_id',
    ];

    /**
     * Get the branch that owns the Survey
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Get the course that owns the Survey
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the user_guarantee associated with the Survey
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_guarantee()
    {
        return $this->hasOne(UserGuarantee::class, 'survey_id');
    }
}
