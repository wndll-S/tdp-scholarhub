<?php

namespace Database\Factories;

use App\Models\School;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EducationDetail>
 */
class EducationDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $school = School::pluck('id')->toArray();
        $student = Student::pluck('id')->toArray();
        return [
            'student_id' => $this->faker->randomElement($student),
            'school_id' => $this->faker->randomElement($school),
            'lrn' => $this->faker->word(),
            'course' => $this->faker->word,
            'major' => $this->faker->word,
            'year_level' =>$this->faker->numberBetween(1,5),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
