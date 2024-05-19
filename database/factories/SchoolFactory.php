<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'name' => $this->faker->firstName(),
            'address' => $this->faker->address,
            'school_type' => $this->faker->numberBetween(1,2),
            'email_address' => $this->faker->safeEmail(),
            'contact_number' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0000000000, $max = NULL),
            'password' => $this->faker->password,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
