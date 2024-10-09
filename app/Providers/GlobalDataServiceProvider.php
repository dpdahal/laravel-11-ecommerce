<?php

namespace App\Providers;

use App\Models\Address\Country;
use App\Models\Page\Menu;
use App\Models\Setting\Setting;
use App\Models\User\AccountType;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class GlobalDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $headerMenuData = Menu::where('is_header', true)->orderBy('order')->get();
        $footerMenuData = Menu::where('is_footer', true)->orderBy('order')->get();
        $homeMenuData = Menu::where('is_home', true)->orderBy('order')->get();
        $settingData = Setting::first();
        $countryData = Country::all();
        $accountTypeData = AccountType::where('name', '!=', 'admin')->get();

        View::share('headerMenuData', $headerMenuData);
        View::share('footerMenuData', $footerMenuData);
        View::share('homeMenuData', $homeMenuData);
        View::share('settingData', $settingData);
        View::share('countryData', $countryData);
        View::share('accountTypeData', $accountTypeData);

    }
}
