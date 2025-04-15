<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }

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

    function experiences(): HasMany
    {
        return $this->hasMany(CandidateExperience::class, 'candidate_id', 'id')->orderBy('id', 'DESC');
    }

    function educations(): HasMany
    {
        return $this->hasMany(CandidateEducation::class, 'candidate_id', 'id')->orderBy('id', 'DESC');
    }

    function portfolioServices(): HasMany
    {
        return $this->hasMany(PortfolioService::class, 'candidate_id', 'id')->orderBy('id', 'DESC');
    }

    function portfolioClients(): HasMany
    {
        return $this->hasMany(PortfolioClient::class, 'candidate_id', 'id')->orderBy('id', 'DESC');
    }


}
