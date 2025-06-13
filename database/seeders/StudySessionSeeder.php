<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudySessionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('study_sessions')->insert([
            [
                'subject_id' => 1, // Mathematics
                'date' => '2025-06-10',
                'start_time' => '08:00:00',
                'end_time' => '10:00:00',
                'note' => 'Focused on algebra and equations.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'subject_id' => 2, // Physics
                'date' => '2025-06-11',
                'start_time' => '09:30:00',
                'end_time' => '11:00:00',
                'note' => 'Reviewed motion and force topics.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'subject_id' => 1, // Mathematics again
                'date' => '2025-06-12',
                'start_time' => '07:00:00',
                'end_time' => '08:30:00',
                'note' => 'Practiced geometry problems.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
