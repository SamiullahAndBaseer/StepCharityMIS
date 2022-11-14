<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher_course extends Model
{
    use HasFactory;

    protected $table = 'teacher_courses';

    protected $fillable = ['course_id', 'user_id'];

    
}
