<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_no',
        'office',
        'category_id',
        'description',
        'serial',
        'manufacture',
        'model',
        'date_purchase',
        'user_id',
        'checkout_instock',
        'quantity',
        'total_cost_lc',
        'total_cost_usd',
        'donation_purchase',
        'location',
        'vendor',
        'condition',
        'age_in_year',
        'useful_life',
        'current_value_lc',
        'current_value_usd',
    ];

    /**
     * Get the category that owns the Inventory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
