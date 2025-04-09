<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatePortfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'candidate_id',
        'hero_title',
        'sub_description',
        'background_image',
        'resume',
        'portfolio_about'
    ];
}
