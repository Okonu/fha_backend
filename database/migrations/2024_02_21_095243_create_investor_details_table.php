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
        Schema::create('investor_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investor_id')->constrained();
            $table->string('enterprise_level');
            $table->string('co_investing');
            $table->string('convenient_investing');
            $table->string('focus_area');
            $table->string('impact');
            $table->string('viability');
            $table->string('expectation');
            $table->string('concern');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investor_details');
    }
};
