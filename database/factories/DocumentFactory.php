<?php

namespace Database\Factories;

use App\Models\School;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
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
            'school_id'  => $this->faker->randomElement($school),
            'document_type' => $this->faker->numberBetween(1,3),
            'file_path' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
