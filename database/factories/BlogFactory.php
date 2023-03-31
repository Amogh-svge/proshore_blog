<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'image' => fake()->imageUrl(640, 480),
            'author_id' => User::all()->random()->id,
            'slug' => fake()->slug(),
            'summary' => fake()->text(100),
            'content' => fake()->paragraph(5),
            'published_at' => fake()->dateTime(),
        ];
    }
}
