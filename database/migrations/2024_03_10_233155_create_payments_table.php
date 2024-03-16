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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('user_type');
            $table->foreignId('user_id');
            $table->string('request_reference')->unique(); 
            $table->decimal('amount', 8, 2); 
            $table->string('result_code')->default('pending'); 
            $table->string('result_desc')->nullable(); 
            $table->string('third_party_reference')->nullable(); 
            $table->string('transaction_code')->nullable(); 
            $table->integer('channel_code')->nullable();
            $table->decimal('charges_total', 8, 2)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
