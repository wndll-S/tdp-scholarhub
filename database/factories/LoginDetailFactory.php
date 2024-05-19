<?php

namespace Database\Factories;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoginDetail>
 */
class LoginDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $student = Student::pluck('id')->toArray();
        return [
            'id' => $this->faker->uuid(),
            'student_id' => $this->faker->randomElement($student),
            'email_address' => $this->faker->email(),
            'mobile_number' => $this->faker->numberBetween(0000000000,9999999999),
            'password' => $this->faker->password,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
