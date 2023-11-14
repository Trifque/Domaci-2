<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class KeyComponentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'component_name'=>$this->faker->title(),
            'purpose'=>$this->faker->paragraph(),
            'size'=>$this->faker->randomNumber($nbDigits = 3, $strict = false),
            'number_of_moving_parts'=>$this->faker->randomNumber($nbDigits = 2, $strict = false),
            'manufacturer_id'=>User::factory(),
        ];
    }
}
