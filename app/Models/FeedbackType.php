<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackType extends Model
{
    use HasFactory;

    protected $table = 'feedback_types';

    protected $fillable = ['name', 'description'];

    /**
     * Get all of the feedbacks for the FeedbackType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'feedback_type_id');
    }
}
