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
            $table->string('client_name')->nullable();
            $table->string('client_company')->nullable();
            $table->string('client_title')->nullable();
            $table->text('client_note')->nullable();
            $table->boolean('client_visible')->default(0);
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
