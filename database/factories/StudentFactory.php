<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'first_name' => $this->faker->firstName,
        'middle_name' =>$this->faker->firstName,
        'last_name' => $this->faker->lastName,
        'birthday' => $this->faker->date(),
        'birth_place' => $this->faker->city(),
        'sex' => $this->faker->numberBetween(1,2),
        'civil_status' => $this->faker->numberBetween(1,4),
        'citizenship' => $this->faker->country(),
        'ip_affiliation'=>$this->faker->sentence(),
        'created_at' => Carbon::now(),
        'updated_at' =>  Carbon::now(),
        ];
    }
}
