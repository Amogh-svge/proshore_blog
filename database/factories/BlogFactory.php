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
        $image = fake()->randomElement([
            'pic1.jpg', 'pic1.jpeg', 'pic2.jpeg', 'pic2.jpg', 'pic4.jpeg',
            'pic3.jpg', 'pic4.jpg', 'pic5.jpg', 'pic6.jpg', 'pic7.jpg', 'pic8.jpg', 'pic9.jpg', 'pic10.jpg'
        ]);
        $title = fake()->text(50);
        return [
            'title' => $title,
            'image' => $image,
            'author_id' => User::all()->random()->id,
            'slug' => Str::slug($title),
            'summary' => fake()->text(100),
            'content' => fake()->paragraph(15),
            'published_at' => fake()->dateTime(),
        ];
    }
}
