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
        Schema::create('professional_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('professional_id')->constrained();
            $table->string('motivation');
            $table->string('credibility_enhancement');
            $table->string('interests');
            $table->string('skills');
            $table->string('benefits');
            $table->string('collaboration_engagement');
            $table->string('aspirations');
            $table->string('contributions');
            $table->string('skill_importance');
            $table->string('goals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professional_details');
    }
};
