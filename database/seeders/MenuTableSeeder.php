<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuData = [
            [
                'name' => 'general',
                'slug' => 'general',
                'is_header' => 0,
                'is_footer' => 1,
                'is_home' => 0,
                'order' => 1,
                'parent_id' => null
            ],
            [
                'name' => 'about us',
                'slug' => 'about-us',
                'is_header' => 1,
                'is_footer' => 1,
                'is_home' => 1,
                'order' => 1,
                'parent_id' => null
            ],
            [
                'name' => 'services',
                'slug' => 'services',
                'is_header' => 1,
                'is_footer' => 1,
                'is_home' => 1,
                'order' => 2,
                'parent_id' => null
            ],

            [
                'name' => 'privacy policy',
                'slug' => 'privacy-policy',
                'is_header' => 0,
                'is_footer' => 1,
                'is_home' => 0,
                'order' => 1,
                'parent_id' => null
            ],
            [
                'name' => 'terms and conditions',
                'slug' => 'terms-and-conditions',
                'is_header' => 0,
                'is_footer' => 1,
                'is_home' => 0,
                'order' => 2,
                'parent_id' => null
            ],


        ];

        foreach ($menuData as $menu) {
            $total = Menu::where('slug', $menu['slug'])->count();
            if ($total === 0) {
                Menu::create($menu);
            }
        }

    }
}
