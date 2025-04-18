<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pic_types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->timestamps();
        });
         // Insert hardcoded values immediately after table creation
        // DB::table('pic_types')->insert([
        //     ['name' => 'thumbnail'],
        //     ['name' => 'full-size'],
        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pic_types');
    }
};
