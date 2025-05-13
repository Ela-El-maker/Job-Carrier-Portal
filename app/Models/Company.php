<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Company extends Model
{
    use Sluggable, HasFactory;

    protected $fillable = [
        'user_id',
        'logo',
        'banner',
        'name',
        'slug',
        'bio',
        'vision',
        'industry_type_id',
        'organization_type_id',
        'team_size_id',
        'establishment_date',
        'website',
        'email',
        'phone',
        'country',
        'state',
        'city',
        'address',
        'map_link',
    ];

    protected $casts = [
        'establishment_date' => 'date',
    ];

    /**
     * Return the sluggable configuration array for this model.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    }

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function companyCountry(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country');
    }

    public function companyState(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state');
    }

    public function companyCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city');
    }

    public function industryType(): BelongsTo
    {
        return $this->belongsTo(IndustryType::class);
    }

    public function organizationType(): BelongsTo
    {
        return $this->belongsTo(OrganizationType::class);
    }

    public function teamSize(): BelongsTo
    {
        return $this->belongsTo(TeamSize::class);
    }

    public function userPlan(): HasOne
    {
        return $this->hasOne(UserPlan::class);
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function applications(): HasManyThrough
    {
        return $this->hasManyThrough(
            AppliedJob::class,
            Job::class,
            'company_id',
            'job_id',
            'id',
            'id'
        );
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->whereHas('user', function($q) {
            $q->where('status', 'active');
        });
    }

    public function scopeWithCompleteProfile($query)
    {
        return $query->whereNotNull(['logo', 'banner', 'bio', 'industry_type_id'])
            ->whereNotNull(['organization_type_id', 'team_size_id', 'establishment_date']);
    }

    // Helper Methods
    public function getLogoUrl(): string
    {
        return $this->logo ? asset($this->logo) : asset('frontend/images/company-default.png');
    }

    public function getBannerUrl(): string
    {
        return $this->banner ? asset($this->banner) : asset('frontend/images/company-banner-default.jpg');
    }

    public function getEstablishmentYear(): ?string
    {
        return $this->establishment_date?->format('Y');
    }

    public function getLocation(): string
    {
        $parts = array_filter([
            $this->companyCity?->name,
            $this->companyState?->name,
            $this->companyCountry?->name
        ]);

        return implode(', ', $parts);
    }

    public function getActiveJobsCount(): int
    {
        return $this->jobs()->where('status', 'active')
            ->where('deadline', '>=', now())->count();
    }

    public function getRecentApplicationsCount(int $days = 7): int
    {
        return $this->applications()
            ->where('created_at', '>=', now()->subDays($days))
            ->count();
    }
}
