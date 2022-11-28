<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name'];

    /**
     * Get all of the inventories for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'category_id');
    }
}
