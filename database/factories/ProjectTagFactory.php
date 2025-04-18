<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectTag>
 */
class ProjectTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "project_id"=> Project::Factory(),
            'tag_id' => function () {
                // Get a random tag ID from existing hardcoded tags
                return Tag::inRandomOrder()->first()->id;
            },
        ];
    }
}
