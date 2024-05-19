<?php

namespace Database\Seeders;

use App\Models\AnnouncementRecipient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnouncementRecipientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AnnouncementRecipient::factory()
                ->count(100)
                ->create();
    }
}
