<?php

namespace Database\Factories;

use App\Models\Announcement;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnnouncementRecipient>
 */
class AnnouncementRecipientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $announcement = Announcement::pluck('id')->toArray();
        $student = Student::pluck('id')->toArray();
        return [
            'announcement_id' => $this->faker->randomElement($announcement),
            'student_id' => $this->faker->randomElement($student),
            'status' => $this->faker->numberBetween(1,2),
            'created_at' =>Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
