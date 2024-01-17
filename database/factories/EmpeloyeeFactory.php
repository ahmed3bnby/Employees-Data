<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empeloyee>
 */
class EmpeloyeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'first_name' => $this->faker->firstName(),
            'last_name' =>  $this->faker->lastname(),
            'email' => $this->faker->safeEmail(),
            'company' => $this->faker->company(),
            'street' => $this->faker->streetAddress(),
            'country' => $this->faker->company(),
            'age' => $this->faker->randomNumber(2),
            'gender' => $this->faker->randomElement(['male', 'female']),

        ];
    }
}
