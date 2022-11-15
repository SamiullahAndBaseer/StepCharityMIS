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
        'item_type_id',
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
}
