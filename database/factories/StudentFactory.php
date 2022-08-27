<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'grade' => $this->faker->numberBetween(1,3).' 年',
            'class' => $this->faker->numberBetween(1,10).' 組',
            'student_num' => $this->faker->numberBetween(1,40).' 番',
            'school'=> $this->faker->country.'高等学校',
            'email'=> $this->faker->unique()->email
        ];
    }
}
