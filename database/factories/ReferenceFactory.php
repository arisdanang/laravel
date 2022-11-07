<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RefernceData>
 */
class ReferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'purchaseNum' => $this->faker->numberBetween($min = null, $max = 9000),
            'item' => $this->faker->randomDigit(),
            'po_text' => $this->faker->text($maxNbChars = 5),
            'tax_code' => $this->faker->text($maxNbChars = 3),
        ];
    }
}
