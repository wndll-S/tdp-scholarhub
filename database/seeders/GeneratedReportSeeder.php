<?php

namespace Database\Seeders;

use App\Models\GeneratedReport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneratedReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneratedReport::factory()
                ->count(100)
                ->create();
    }
}
