<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'location',
        'amount',
        'payment_mode',
        'transaction_id',
        'message',
        'is_anonymous'
    ];
}
