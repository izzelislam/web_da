<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'title'         => $this->faker->sentence(4),
            'cover_image'   => '/dumy/tes.jpg',
            'content'       => $this->faker->paragraphs(50, true),
            'created_by'    => $this->faker->name(),
            'updated_by'    => $this->faker->name(),
        ];
    }
}
