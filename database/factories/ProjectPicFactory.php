<?php

namespace Database\Factories;

use App\Models\PicType;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectPic>
 */
class ProjectPicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "path" => $this-> faker -> imageUrl,
            "pic_type_id"=> function () {
                // Get a random tag ID from existing hardcoded tags
                return PicType::inRandomOrder()->first()->id;
            },
            "project_id" => Project::Factory()
        ];
    }
}
