<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
     public function up()
     {
         Schema::create('form_submissions', function (Blueprint $table) {
             $table->id();
             $table->string('name');
             $table->string('email');
             $table->string('phone')->nullable();
             $table->string('company_name')->nullable();
             $table->string('website')->nullable();
             $table->string('interest');
             $table->string('budget_range');
             $table->string('exact_budget')->nullable();
             $table->string('timeline')->nullable();
             $table->text('message');
             
             // Security tracking fields
             $table->string('ip_address');
             $table->text('user_agent');
             $table->string('country')->nullable();
             $table->string('city')->nullable();
             $table->string('device_type')->nullable();
             $table->string('browser')->nullable();
             $table->string('operating_system')->nullable();
             $table->boolean('is_bot')->default(false);
             
             $table->timestamps();
         });
     }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_submissions');
    }
};
