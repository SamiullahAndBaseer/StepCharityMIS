<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryReport extends Model
{
    use HasFactory;

    protected $table = 'salary_reports';

    protected $fillable = [
        'user_id',
        'salary',
        'present_days',
        'leave_days',
        'tip',
        'description',
        'status',
        'payer_id'
    ];

    /**
     * Get the user that owns the SalaryReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the payer that owns the SalaryReport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payer()
    {
        return $this->belongsTo(User::class);
    }
}
