<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job\JobLevel;

class JobLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobLevelsData = [
            ['name' => 'Entry Level'],
            ['name' => 'Mid Level'],
            ['name' => 'Senior Level'],
            ['name' => 'Top Level'],

        ];

        foreach ($jobLevelsData as $jobLevelData) {
            $total = JobLevel::where('name', $jobLevelData['name'])->count();
            if ($total === 0) {
                JobLevel::create($jobLevelData);
            }
        }
    }
}
