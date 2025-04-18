<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'PHP',
            'JavaScript', 
            'Laravel',
            'C#',
            'GoDot',
            'Extension'
        ];
    
        foreach ($tags as $tagName) {
            Tag::updateOrCreate(
                ['name' => $tagName]
            );
        }
    }
}
