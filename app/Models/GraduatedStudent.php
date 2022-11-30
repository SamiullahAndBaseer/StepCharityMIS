<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraduatedStudent extends Model
{
    use HasFactory;

    protected $table = 'graduated_students';

    protected $fillable = [
        'student_id',
        'course_id'
    ];

    /**
     * Get the user that owns the GraduatedStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * Get the course that owns the GraduatedStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
