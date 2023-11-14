<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\KeyComponent;
use App\Models\User;

class RobotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'model_name'=>$this->faker->title(),
            'nickname'=>$this->faker->name(),
            'purpose'=>$this->faker->paragraph(),
            'height'=>$this->faker->randomNumber($nbDigits = 3, $strict = false),
            'weight'=>$this->faker->randomNumber($nbDigits = 3, $strict = false),
            'cost'=>$this->faker->randomNumber($nbDigits = 5, $strict = false),
            'creator_id'=>User::factory(),
            'key_component_id'=>KeyComponent::factory(),
        ];
    }
}
