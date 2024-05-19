<?php

namespace Database\Factories;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FamilyBackground>
 */
class FamilyBackgroundFactory extends Factory
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
            'student_id' =>$this->faker->randomElement($student),
            'total_gross_income' => $this->faker->numberBetween(1000,400000),
            'number_of_siblings' => $this->faker->numberBetween(0,10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
