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
        Schema::create('project_pics', function (Blueprint $table) {
            $table->id();
            $table -> string('path');
            $table -> foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table -> foreignId('pic_type_id')->constrained('pic_types')->onDelete('cascade');
            $table->timestamps();
        });
    }                

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_pics');
    }
};
