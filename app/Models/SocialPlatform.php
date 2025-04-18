<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialPlatform extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type'];


    public function candidateSocials()
    {
        return $this->hasMany(CandidateSocial::class);
    }
}
