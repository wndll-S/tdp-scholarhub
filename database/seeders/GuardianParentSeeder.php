<?php

namespace Database\Seeders;

use App\Models\GuardianParent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuardianParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GuardianParent::factory()
                ->count(50)
                ->create();
    }
}
