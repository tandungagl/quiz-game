<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    public function definition()
    {

        return [
            'question' => $this->faker->sentence(10),
            'option_a' => $this->faker->sentence(3),
            'option_b' => $this->faker->sentence(3),
            'option_c' => $this->faker->sentence(3),
            'option_d' => $this->faker->sentence(3),
            'correct_option' => $this->faker->randomElement([1,2,3,4]),
        ];
    }
}
