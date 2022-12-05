<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    use HasFactory;

    protected $table = 'student_attendances';

    protected $fillable = ['user_id', 'time_in', 'present', 'course_id', 'attendance_getter_id'];
    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the course that owns the StudentAttendance
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
