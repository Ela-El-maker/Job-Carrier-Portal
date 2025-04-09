<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidate_portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained('candidates')->onDelete('cascade');
            $table->string('hero_title')->nullable();
            $table->string('background_image')->nullable();
            $table->text('resume')->nullable();
            $table->text('sub_description')->nullable();
            $table->text('portfolio_about')->nullable();
            $table->string('github_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('whatsapp_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->boolean('portfolio_complete')->default(0);
            $table->boolean('portfolio_visibility')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_portfolios');
    }
};
