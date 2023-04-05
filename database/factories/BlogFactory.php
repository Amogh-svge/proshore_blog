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
        $title = fake()->text(50);
        return [
            'title' => $title,
            'image' => fake()->imageUrl(640, 480),
            'author_id' => User::all()->random()->id,
            'slug' => Str::slug($title),
            'summary' => fake()->text(100),
            'content' => fake()->paragraph(15),
            'published_at' => fake()->dateTime(),
        ];
    }
}
