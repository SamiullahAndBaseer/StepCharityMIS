<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationInfo extends Model
{
    use HasFactory;

    protected $table = 'education_infos';

    protected $fillable = [
        'institution',
        'subject',
        'starting_date',
        'complete_date',
        'degree',
        'grade',
        'additional',
        'user_id'
    ];

    /**
     * Get the user that owns the EducationInfo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
