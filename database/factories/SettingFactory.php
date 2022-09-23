<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'about'     => $this->faker->paragraphs(8, true),
            'wa'        => '90128398712',
            'instagram' => 'https://instagram/ajksh',
            'youtube'   => 'https://youtube.com',
            'email'     => 'tes@mail.com',
            'address'   =>  $this->faker->address()
        ];
    }
}
