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
     * Get all of the student_course for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function student_course()
    {
        return $this->hasMany(Student_course::class);
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
}
