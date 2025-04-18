<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogPic;
use App\Models\Tag;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\PicType;
use App\Models\Project;
use App\Models\ProjectPic;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed hardcoded types and tags first
        $this->call([
            PicTypeSeeder::class,
            TagSeeder::class,
            SocialsSeeder::class,
        ]);

        // 2. Get IDs for later use
        $tags = Tag::all(); // Get full tag models instead of just IDs
        $mediumTypeId = PicType::where('type', 'medium')->first()->id;
        $largeTypeId = PicType::where('type', 'large')->first()->id;

        // 3. Create projects with relationships
        Project::factory(20)
            ->afterCreating(function (Project $project) {
                
                $randomTags = Tag::inRandomOrder()->limit(3)->get();
                $project->tags()->attach($randomTags);
            })
            ->has(
                ProjectPic::factory(3)
                    ->state(['pic_type_id' => $mediumTypeId]),
                'ProjectPics'
            )
            ->has(
                ProjectPic::factory(1)
                    ->state(['pic_type_id' => $largeTypeId]),
                'ProjectPics'
            )
            ->create();

        // 4. Create blogs with pictures
            Blog::factory(10)
            ->has(
                BlogPic::factory(3)->state(['pic_type_id' => $mediumTypeId]),
                'BlogPics'
            )
            ->has(
                BlogPic::factory(2)->state(['pic_type_id' => $largeTypeId]),
                'BlogPics'
            )
            ->create();
    }
}
    





