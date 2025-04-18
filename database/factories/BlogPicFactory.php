<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\PicType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPic>
 */
class BlogPicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "pic_type_id"=> function () {
                // Get a random tag ID from existing hardcoded tags
                return PicType::inRandomOrder()->first()->id;
            },
            "blog_id" => Blog::Factory(),
            "path"=> $this->faker->imageUrl,
        ];
    }
}
