<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"=> $this->faker->name,
            "task"=> $this->faker->sentence(10),
            "description"=> $this->faker->sentence(20),
            "client"=> $this->faker->name,
            "selected" => $this->faker->boolean,
            "url" => $this->faker->url,
        ];
    }
}
