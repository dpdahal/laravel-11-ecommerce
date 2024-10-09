<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job\Experience;

class ExperienceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($x = 1; $x <= 200; $x++) {
            $name = 'experience ' . $x . ' years';
            $total = Experience::where('name', $name)->count();
            if ($total === 0) {
                Experience::create([
                    'name' => $name
                ]);
            }
        }

    }
}
