<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Biodata>
 */
class BiodataFactory extends Factory
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
            'fullname'          => $this->faker->name(),
            'name'              => $this->faker->firstName(),
            'brth_date'         => $this->faker->date('d/m/Y'),
            'brth_place'        => $this->faker->city(),
            'order_of_birth'    => rand(1,5),
            'language'          => $this->faker->randomElement(['Ingris', 'Arab', 'Indonesia']),
            'address'           => $this->faker->address(),      
            'rt_rw'             => $this->faker->randomElement(['1/3', '2/4', '4/1']),
            'village'           => $this->faker->city(),
            'district'          => $this->faker->city(),
            'regency'           => $this->faker->city(),
            'province'          => $this->faker->city(),
            'height'            => rand(130, 190),
            'weight'            => rand(40, 90),
            'vision'            => rand(1, 0),
            'hearing'           => rand(1, 0),
            'disease_present'   => $this->faker->sentence(10),
            'disease_once'      => $this->faker->sentence(10),
            'prev_school'       => $this->faker->company(),
            'moved_school'      => $this->faker->company(),
            'learn_duration'    => rand(1,3),
            'accepted_at'       => $this->faker->date('d/m/Y'),
            'moved_reason'      => $this->faker->sentence(10),
            'brothers'          => rand(1, 12),
            'blood'             => $this->faker->randomElement(['A', 'AB', 'B', 'O']),
        ];
    }
}
