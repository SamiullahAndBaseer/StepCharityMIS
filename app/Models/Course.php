<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * Get all of the student_course for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function student_course()
    {
        return $this->hasMany(Student_course::class);
    }
}
