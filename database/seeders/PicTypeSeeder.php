<?php

namespace Database\Seeders;

use App\Models\PicType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PicTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    // Only insert if types DON'T exist (correct logic)
    if(!PicType::where('type', 'medium')->exists()) {
        PicType::create(['type' => 'medium']);  // Use create() for single record
    }

    if(!PicType::where('type', 'large')->exists()) {
        PicType::create(['type' => 'large']);
    }
}
}
