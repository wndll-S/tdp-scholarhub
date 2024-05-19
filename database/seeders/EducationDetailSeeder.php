<?php

namespace Database\Seeders;

use App\Models\EducationDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EducationDetail::factory()
                ->count(30)
                ->create();
    }
}
