<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternshipRegistration extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'gender', 'email', 'phone', 'position', 'why', 'skills', 'user_id'
    ];
}