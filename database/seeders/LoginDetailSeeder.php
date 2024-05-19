<?php

namespace Database\Seeders;

use App\Models\LoginDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoginDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoginDetail::factory()
                ->count(30)
                ->create();
    }
}
