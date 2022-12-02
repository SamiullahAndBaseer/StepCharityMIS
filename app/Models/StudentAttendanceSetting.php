<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendanceSetting extends Model
{
    use HasFactory;

    protected $table = 'student_attendance_settings';

    protected $fillable = ['course_id', 'start_attendance', 'end_attendance'];

    /**
     * Get the course that owns the StudentAttendanceSetting
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
