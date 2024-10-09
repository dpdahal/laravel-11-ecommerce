<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job\Education;

class EducationLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educationLevelData = [
            ['name' => 'High School'],
            ['name' => 'Diploma'],
            ['name' => 'Bachelor'],
            ['name' => 'Master'],
            ['name' => 'Doctorate'],

        ];


        foreach ($educationLevelData as $educationLevel) {
            $totalEducationLevel = Education::where('name', $educationLevel['name'])->count();
            if ($totalEducationLevel === 0) {
                Education::create($educationLevel);
            }
        }
    }
}
