<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doc>
 */
class DocFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'       => rand(1, 200),
            'akta'          => '/dumy/akta.jpg', 
            'ijazah'        => '/dumy/kelulusan.jpg', 
            'payment'       => '/dumy/transfer.jpg', 
            'family_card'   => '/dumy/kk.jpg'
        ];
    }
}
