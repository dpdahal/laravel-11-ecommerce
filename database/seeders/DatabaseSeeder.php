<?php

namespace Database\Seeders;

use App\Models\Setting\Setting;
use App\Models\User\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            ContinentTableSeeder::class,
            CountryTableSeeder::class,
            AccountTypeTableSeeder::class,
            RoleTableSeeder::class,
            PermissionTableSeeder::class,
            UserTableSeeder::class,
            MenuTableSeeder::class,
            SettingTableSeeder::class,
            MemberTypeTableSeeder::class,
            TestimonialTableSeeder::class,
            JobCategoryTableSeeder::class,
            JobTypeTableSeeder::class,
            SkillsTableSeeder::class,
            JobLevelTableSeeder::class,
            EducationLevelTableSeeder::class,
            ExperienceTableSeeder::class,
        ]);
    }
}
