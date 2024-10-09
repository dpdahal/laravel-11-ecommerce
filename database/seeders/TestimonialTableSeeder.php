<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial\Testimonial;

class TestimonialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonialData = [
            [
                'name' => 'ram',
                'designation' => 'CEO',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'image' => ''
            ],
            [
                'name' => 'sita',
                'designation' => 'CTO',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'image' => ''
            ],
            [
                'name' => 'gita',
                'designation' => 'COO',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'image' => ''
            ],
            [
                'name' => 'hari',
                'designation' => 'CFO',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'image' => ''
            ]
        ];

        foreach ($testimonialData as $data) {
            $totalTestimonial = Testimonial::where('name', $data['name'])->count();
            if ($totalTestimonial === 0) {
                Testimonial::create($data);
            }
        }


    }
}
