<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category::class;

    public function definition(): array
    {

        $title = fake()->unique()->randomElement(['Entertainment', 'Lifestyle', 'Sports']);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'status' => fake()->randomElement(['active', 'passive']),
            'content' => fake()->paragraph(1),
            'image' => fake()->imageUrl(640, 480),
        ];
    }
}
