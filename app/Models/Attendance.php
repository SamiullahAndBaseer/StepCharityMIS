<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';

    protected $fillable = ['user_id', 'time_in', 'time_out', 'present', 'attendance_getter_id'];
    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
