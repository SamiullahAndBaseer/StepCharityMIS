<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function users()
   {
        return $this->hasMany(User::class);
    }

    /**
     * Get all of the surveys for the Branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function surveys()
    {
        return $this->hasMany(Survey::class, 'branch_id');
    }
}
