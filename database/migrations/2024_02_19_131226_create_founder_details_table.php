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
        Schema::create('founder_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('founder_id')->constrained();
            $table->string('company_name');
            $table->string('business_type');
            $table->string('financial_level');
            $table->string('focus_area');
            $table->string('challenges');
            $table->string('funding_status');
            $table->string('partnership');
            $table->string('community_support');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('founder_details');
    }
};
