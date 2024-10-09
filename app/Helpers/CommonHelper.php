<?php

namespace App\Helpers;

use App\Models\About\About;
use App\Models\Banner\Banner;
use App\Models\Posts\Posts;
use App\Models\Section\Section;
use App\Models\Setting\Setting;


class CommonHelper
{

    public function getSetting()
    {
        return Setting::first();
    }

    public function getSection()
    {
        return Section::all();
    }
    public function getAboutHomePage()
    {
       return About::first();
    }

    public function getBanner(){
        return Banner::all();
    }

    public function getHomeBlogSection()
    {
        return Posts::orderBy('created_at', 'desc')->take(4)->get();

    }

}
