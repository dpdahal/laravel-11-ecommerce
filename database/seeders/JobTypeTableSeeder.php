<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job\JobType;

class JobTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobTypesData = [
            ['type' => 'Full Time'],
            ['type' => 'Part Time'],
            ['type' => 'Freelance'],
            ['type' => 'Internship'],
            ['type' => 'Temporary'],
            ['type' => 'Contract'],
        ];

        foreach ($jobTypesData as $jobType) {
            $total = JobType::where('type', $jobType['type'])->count();
            if ($total === 0) {
                JobType::create($jobType);
            }
        }
    }
}
