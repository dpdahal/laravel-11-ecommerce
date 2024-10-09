<?php

namespace Database\Seeders;

use App\Models\Setting\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settingData = [
            'name' => 'everest talent solution',
            'slug' => 'everest-talent-solution',
            'email' => 'info@everesttalentsoution.com',
            'address' => 'Kathmandu, Nepal',
            'phone' => '1234567890',
            'mobile' => '1234567890',
            'description' => 'job portal is a job portal website.',
            'meta_title' => 'job portal',
            'meta_description' => 'job portal is a job portal website.',
            'meta_keywords' => 'job',

        ];

        $total = Setting::count();
        if ($total == 0) {
            Setting::create($settingData);
        }
    }
}
