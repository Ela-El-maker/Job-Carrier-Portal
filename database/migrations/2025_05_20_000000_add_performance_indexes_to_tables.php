<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Add indexes to improve query performance across frequently accessed tables.
     */
    public function up(): void
    {
        // Add indexes to jobs table for common query patterns
        Schema::table('jobs', function (Blueprint $table) {
            // Composite index for active jobs listing (most common query)
            $table->index(['status', 'deadline', 'created_at'], 'idx_jobs_active_listing');
            
            // Index for company jobs
            $table->index(['company_id', 'status', 'deadline'], 'idx_jobs_company_active');
            
            // Index for category-based queries
            $table->index(['job_category_id', 'status', 'deadline'], 'idx_jobs_category_active');
            
            // Index for location-based searches
            $table->index(['country_id', 'state_id', 'city_id'], 'idx_jobs_location');
            
            // Index for slug lookups
            $table->index('slug');
            
            // Index for featured/highlighted jobs
            $table->index(['is_featured', 'is_highlighted', 'is_golden'], 'idx_jobs_premium');
        });

        // Add indexes to companies table
        Schema::table('companies', function (Blueprint $table) {
            // Index for visible companies
            $table->index(['profile_completion', 'visibility'], 'idx_companies_visible');
            
            // Index for slug lookups
            $table->index('slug');
            
            // Index for industry and organization filtering
            $table->index('industry_type_id');
            $table->index('organization_type_id');
            
            // Index for location-based searches
            $table->index(['country', 'state', 'city'], 'idx_companies_location');
        });

        // Add indexes to candidates table
        Schema::table('candidates', function (Blueprint $table) {
            // Index for visible candidates
            $table->index(['profile_complete', 'visibility'], 'idx_candidates_visible');
            
            // Index for slug lookups
            $table->index('slug');
            
            // Index for experience filtering
            $table->index('experience_id');
            
            // Index for profession filtering
            $table->index('profession_id');
            
            // Index for location-based searches
            $table->index(['country', 'state', 'city'], 'idx_candidates_location');
        });

        // Add indexes to applied_jobs table
        Schema::table('applied_jobs', function (Blueprint $table) {
            // Composite index for candidate's applied jobs
            $table->index(['candidate_id', 'created_at'], 'idx_applied_candidate_date');
            
            // Index for job applications count
            $table->index(['job_id', 'created_at'], 'idx_applied_job_date');
        });

        // Add indexes to job_categories table
        Schema::table('job_categories', function (Blueprint $table) {
            // Index for slug lookups
            $table->index('slug');
            
            // Index for featured categories
            $table->index('show_at_featured');
            
            // Index for popular categories
            $table->index('show_at_popular');
        });

        // Add indexes to orders table for earnings queries
        Schema::table('orders', function (Blueprint $table) {
            // Index for company orders
            $table->index(['company_id', 'created_at'], 'idx_orders_company_date');
            
            // Index for date-based earnings queries
            $table->index('created_at');
        });

        // Add indexes to blogs table
        Schema::table('blogs', function (Blueprint $table) {
            // Index for published blogs
            $table->index(['status', 'created_at'], 'idx_blogs_published');
            
            // Index for slug lookups
            $table->index('slug');
        });

        // Add indexes to job_bookmarks table
        Schema::table('job_bookmarks', function (Blueprint $table) {
            // Composite index for candidate bookmarks
            $table->index(['candidate_id', 'job_id'], 'idx_bookmarks_candidate_job');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropIndex('idx_jobs_active_listing');
            $table->dropIndex('idx_jobs_company_active');
            $table->dropIndex('idx_jobs_category_active');
            $table->dropIndex('idx_jobs_location');
            $table->dropIndex(['slug']);
            $table->dropIndex('idx_jobs_premium');
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->dropIndex('idx_companies_visible');
            $table->dropIndex(['slug']);
            $table->dropIndex(['industry_type_id']);
            $table->dropIndex(['organization_type_id']);
            $table->dropIndex('idx_companies_location');
        });

        Schema::table('candidates', function (Blueprint $table) {
            $table->dropIndex('idx_candidates_visible');
            $table->dropIndex(['slug']);
            $table->dropIndex(['experience_id']);
            $table->dropIndex(['profession_id']);
            $table->dropIndex('idx_candidates_location');
        });

        Schema::table('applied_jobs', function (Blueprint $table) {
            $table->dropIndex('idx_applied_candidate_date');
            $table->dropIndex('idx_applied_job_date');
        });

        Schema::table('job_categories', function (Blueprint $table) {
            $table->dropIndex(['slug']);
            $table->dropIndex(['show_at_featured']);
            $table->dropIndex(['show_at_popular']);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex('idx_orders_company_date');
            $table->dropIndex(['created_at']);
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->dropIndex('idx_blogs_published');
            $table->dropIndex(['slug']);
        });

        Schema::table('job_bookmarks', function (Blueprint $table) {
            $table->dropIndex('idx_bookmarks_candidate_job');
        });
    }
};
