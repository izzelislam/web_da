<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'unit_id'           => rand(1,4),
            'school_year_id'    => rand(1, 4),
            'name'              => $this->faker->name(),
            'email'             => $this->faker->email(),
            'phone_number'      => $this->faker->phoneNumber(),
            'image'             => '/dumy/avatar.jpg',
            'password'           => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'code'          => CodeGenerator(16),
            'nik'          => CodeGenerator(16),
            'gender'    => $this->faker->randomElement(['laki-laki', 'perempuan'])
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
