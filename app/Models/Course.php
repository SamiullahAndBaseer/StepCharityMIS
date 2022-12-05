<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * Get all of the teacher_courses for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teacher_courses()
    {
        return $this->hasMany(Teacher_course::class, 'course_id');
    }

    
    /**
     * Get all of the student_courses for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function student_courses()
    {
        return $this->hasMany(Student_course::class, 'course_id');
    }

    /**
     * Get all of the lessons for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    /**
     * Get the curriculum associated with the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function curriculum()
    {
        return $this->hasOne(Curriculum::class, 'course_id');
    }

    /**
     * Get all of the certificate for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function certificate()
    {
        return $this->hasMany(Certificate::class, 'course_id');
    }

    /**
     * Get all of the surveys for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function surveys()
    {
        return $this->hasMany(Survey::class, 'course_id');
    }

    /**
     * Get all of the graduated for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function graduated()
    {
        return $this->hasMany(GraduatedStudent::class, 'course_id');
    }

    /**
     * Get the course_attendance associated with the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function course_attendance()
    {
        return $this->hasOne(StudentAttendanceSetting::class, 'course_id');
    }

    /**
     * Get all of the attendance for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'course_id');
    }
}
