<?php

namespace Database\Factories;

use App\Models\FamilyBackground;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GuardianParent>
 */
class GuardianParentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $familyBackground = FamilyBackground::pluck('id')->toArray();
        return [
            'family_background_id' => $this->faker->randomElement($familyBackground),
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->lastName,
            'last_name' => $this->faker->lastName,
            'address' => $this->faker->address,
            'contact_number' => $this->faker->numberBetween(0000000000,9999999999),
            'occupation'=> $this->faker->word(),
            'employer_name' => $this->faker->name(),
            'employer_address' => $this->faker->address(),
            'annual_gross_income' => $this->faker->numberBetween(1000,100000),
            'status' => $this->faker->numberBetween(1,2),
            'relationship' => $this->faker->numberBetween(1,3),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
