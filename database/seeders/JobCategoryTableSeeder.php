<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job\JobCategory;

class JobCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobCategories = [
            [
                'user_id' => 1,
                'name' => 'development',
                'slug' => 'development',
                'description' => 'development',
                'image' => '',
                'icon' => '',
            ],
            [
                'user_id' => 1,
                'name' => 'finance',
                'slug' => 'finance',
                'description' => 'finance',
                'image' => '',
                'icon' => '',
            ],

            [
                'user_id' => 1,
                'name' => 'marketing',
                'slug' => 'marketing',
                'description' => 'marketing',
                'image' => '',
                'icon' => '',
            ],
        ];

        foreach ($jobCategories as $category) {
            $total = JobCategory::where('slug', $category['slug'])->count();
            if ($total == 0) {
                JobCategory::create($category);
            }
        }


    }
}
