<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mother>
 */
class MotherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'           => rand(1, 200),
            'name'              => $this->faker->name(),
            'birth_date'        => $this->faker->date('d/m/Y'),
            'place_birth'       => $this->faker->city(),
            'profession'        => $this->faker->word(2),
            'last_education'    => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'Sarjana']),
            'income'            => rand(500000, 10000000),
        ];
    }
}
