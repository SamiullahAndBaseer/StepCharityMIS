<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remittance extends Model
{
    use HasFactory;

public function sender()
{
    $this->belongsTo(User::class, 'sender_id');
}

public function receiver()
{
    $this->belongsTo(User::class, 'receiver_id');
}

}
