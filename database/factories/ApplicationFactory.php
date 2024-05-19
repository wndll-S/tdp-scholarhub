<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
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
            'status' => $this->faker->numberBetween(1,4),
            'ranking_pts' =>$this->faker->numberBetween(1,100),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
