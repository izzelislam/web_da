<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'link' => 'https://www.youtube.com/embed/YzV3GBb_1IM',
            'title' => $this->faker->sentence(4),
            'desc'  => $this->faker->sentence(10)
        ];
    }
}
