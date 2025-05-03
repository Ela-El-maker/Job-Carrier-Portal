<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ClientReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'review',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function candidate(): HasOne
    {
        return $this->hasOne(Candidate::class, 'user_id', 'user_id');
    }

    // Relationship to fetch the Company information from the review
    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'user_id', 'user_id');
    }
}
