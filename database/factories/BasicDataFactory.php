<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BasicData>
 */
class BasicDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'invoice_date' => now(),
            'posting_date' => now(),
            'amount' => 1000,
            'text' => $this->faker->name(),
            'currency' => 'IDR',
            'version_tax' => 'v1',
            'reference' => $this->faker->randomNumber($nbDigits = NULL, $strict = false)
        ];
    }
}
