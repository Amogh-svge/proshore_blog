<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'blog_id' => Blog::all()->random()->id,
            'title' => fake()->title(),
            'published_date' => fake()->dateTime(),
            'comments' => fake()->paragraph(1),
        ];
    }
}
