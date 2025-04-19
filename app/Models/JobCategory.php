<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobCategory extends Model
{
    use HasFactory, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    function jobs(): HasMany
    {
        return $this->hasMany(Job::class, 'job_category_id', 'id');
    }

    public function updateFeaturedStatus(): void
    {
        $totalJobs = $this->jobs()->count();
        $featuredJobs = $this->jobs()->where('is_featured', true)->count();
        $this->show_at_featured = ($totalJobs > 10 && $featuredJobs === $totalJobs);
        $this->save();
    }
    public function updatePopularStatus(): void
    {
        $this->loadCount('jobs');
        $this->show_at_popular = $this->jobs_count > 10;
        $this->save();
    }
}
