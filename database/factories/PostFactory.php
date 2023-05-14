<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => str($this->faker->paragraph)->limit(250),
            'content' => $this->faker->text,
            'published' => $this->faker->boolean,
            'created_at' => $this->faker->dateTime,
        ];
    }
}
