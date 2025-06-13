<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProgressReportSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('progress_reports')->insert([
            [
                'user_id' => 1, // Sreytey
                'subject_id' => 1, // Mathematics
                'week_start' => '2025-06-03',
                'planned_hours' => 10.0,
                'studied_hours' => 8.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2, // Rim
                'subject_id' => 2, // Physics
                'week_start' => '2025-06-03',
                'planned_hours' => 12.0,
                'studied_hours' => 11.0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 1,
                'subject_id' => 1,
                'week_start' => '2025-06-10',
                'planned_hours' => 8.0,
                'studied_hours' => 6.5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
