<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => $this->faker->email(),
            'whatsapp' => $this->faker->phoneNumber(),
            'telegram' => $this->faker->phoneNumber(),
            'viber' => $this->faker->phoneNumber(),
            'user_id' => $this->faker->unique()->randomDigitNotNull(),
        ];
    }
}
