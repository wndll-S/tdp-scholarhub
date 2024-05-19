<?php

namespace Database\Factories;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentAddress>
 */
class StudentAddressFactory extends Factory
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
            'id' => $this->faker->uuid,
            'student_id' => $this->faker->randomElement($student),
            'barangay' => $this->faker->streetAddress(),
            'city_town' => $this->faker->city(),
            'district' => $this->faker->numberBetween(1,8),
            'zip_code' => $this->faker->numberBetween(1111,9999),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
