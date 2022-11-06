<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_course extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'user_id'];

    /**
     * Get the course that owns the Student_course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
