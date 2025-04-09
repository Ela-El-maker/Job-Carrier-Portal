<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CandidateSocial extends Model
{
    use HasFactory;
    protected $fillable = ['candidate_id', 'social_id', 'url'];

    function social(): BelongsTo
    {
        return $this->belongsTo(SocialPlatform::class, 'social_id', 'id');
    }
}
