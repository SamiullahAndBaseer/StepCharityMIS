<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';

    protected $fillable = ['title', 'user_id', 'description', 'feedback_type_id'];

    /**
     * Get the user that owns the Feedback
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the feedback_type that owns the Feedback
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function feedback_type()
    {
        return $this->belongsTo(FeedbackType::class);
    }
}
