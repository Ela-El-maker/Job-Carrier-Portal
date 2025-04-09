<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CandidatePortfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'candidate_id',
        'hero_title',
        'sub_description',
        'background_image',
        'resume',
        'portfolio_about',
        'github_url',
        'linkedin_url',
        'whatsapp_url',
        'instagram_url',
        'portfolio_url',

    ];


    function services(): HasMany
    {
        return $this->hasMany(PortfolioService::class, 'candidate_id', 'id')->orderBy('id', 'DESC');
    }

    function clients(): HasMany
    {
        return $this->hasMany(PortfolioClient::class, 'candidate_id', 'id')->orderBy('id', 'DESC');
    }

    function candidateSocial(): HasMany
    {
        return $this->hasMany(CandidateSocial::class, 'candidate_id', 'id');
    }
}
