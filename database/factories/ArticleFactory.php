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
            'category_id'   => rand(1, 5),
            'title'         => $this->faker->sentence(4),
            'meta'          => $this->faker->sentence(4),
            'slug'          => $this->faker->slug(6, true),
            'cover_image'   => '/dumy/tes.jpg',
            'short_describtion'       => $this->faker->paragraphs(5, true),
            'content'       => $this->faker->paragraphs(50, true),
            'created_by'    => $this->faker->name(),
            'updated_by'    => $this->faker->name(),
        ];
    }
}
