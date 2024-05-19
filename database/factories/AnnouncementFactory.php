<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\School;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $admin = Admin::pluck('id')->toArray();
        $school = School::pluck('id')->toArray();
        return [
            'admin_id' => $this->faker->randomElement($admin),
            'school_id' => $this->faker->randomElement($school),
            'title' => $this->faker->sentence,
            'message' => $this->faker->sentence,
            'is_for_all' =>$this->faker->boolean(),
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now(),
        ];
    }
}
