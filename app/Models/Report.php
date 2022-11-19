<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = ['title', 'description', 'receiver', 'user_id', 'report_type_id'];

    /**
     * Get the reportType that owns the Report
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reportType()
    {
        return $this->belongsTo(ReportType::class);
    }
}
