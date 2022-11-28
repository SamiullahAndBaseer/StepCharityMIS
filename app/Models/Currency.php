<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
   use HasFactory;

   protected $fillable = ['name', 'symbol'];
  
   public function user()
   {
       return $this->hasMany(User::class, 'user_id');
   }

   /**
    * Get all of the remittance for the Currency
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function remittance()
   {
       return $this->hasMany(Remittance::class, 'currency_id');
   }

   /**
    * Get all of the quotations for the Currency
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function quotations()
   {
       return $this->hasMany(Quotation::class, 'currency_id');
   }
}
