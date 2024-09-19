<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'image',
        'cv',
        'full_name',
        'title',
        'website',
        'experience_id',
        'birth_date'
    ];
}
