<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'article_id' => rand(1,200),
            'username'   => $this->faker->name(),
            'coment'     => $this->faker->sentence(20),
            'like'       => rand(1, 0)
        ];
    }
}
