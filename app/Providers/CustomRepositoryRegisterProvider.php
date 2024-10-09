<?php

namespace App\Providers;

use App\Repositories\Account\AccountType\AccountTypeInterface;
use App\Repositories\Account\AccountType\AccountTypeRepository;
use App\Repositories\Account\Admin\AdminInterface;
use App\Repositories\Account\Admin\AdminRepository;
use App\Repositories\Address\ContinentInterface;
use App\Repositories\Address\ContinentRepository;
use App\Repositories\Address\CountryInterface;
use App\Repositories\Address\CountryRepository;
use App\Repositories\Banner\BannerInterface;
use App\Repositories\Banner\BannerRepository;
use App\Repositories\Blogs\BlogChild\BlogChildInterface;
use App\Repositories\Blogs\BlogChild\BlogChildRepository;
use App\Repositories\Blogs\BlogsInterface;
use App\Repositories\Blogs\BlogsRepository;
use App\Repositories\Blogs\Category\BlogCategoryInterface;
use App\Repositories\Blogs\Category\BlogCategoryRepository;
use App\Repositories\Employer\EmployerInterface;
use App\Repositories\Employer\EmployerRepository;
use App\Repositories\MemberType\MemberTypeInterface;
use App\Repositories\MemberType\MemberTypeRepository;
use App\Repositories\Page\MenuInterface;
use App\Repositories\Page\MenuRepository;
use App\Repositories\Page\PageInterface;
use App\Repositories\Page\PageRepository;
use App\Repositories\Permission\PermissionInterface;
use App\Repositories\Permission\PermissionRepository;
use App\Repositories\Profile\UserProfileInterface;
use App\Repositories\Profile\UserProfileRepository;
use App\Repositories\Roles\RolesInterface;
use App\Repositories\Roles\RolesRepository;
use App\Repositories\Setting\SettingInterface;
use App\Repositories\Setting\SettingRepository;
use App\Repositories\Team\TeamInterface;
use App\Repositories\Team\TeamRepository;
use App\Repositories\Testimonial\TestimonialInterface;
use App\Repositories\Testimonial\TestimonialRepository;
use Illuminate\Support\ServiceProvider;

class CustomRepositoryRegisterProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RolesInterface::class, RolesRepository::class);
        $this->app->bind(PermissionInterface::class, PermissionRepository::class);
        $this->app->bind(AdminInterface::class, AdminRepository::class);
        $this->app->bind(AccountTypeInterface::class, AccountTypeRepository::class);
        $this->app->bind(UserProfileInterface::class, UserProfileRepository::class);
        $this->app->bind(MemberTypeInterface::class, MemberTypeRepository::class);
        $this->app->bind(TeamInterface::class, TeamRepository::class);
        $this->app->bind(BlogCategoryInterface::class, BlogCategoryRepository::class);
        $this->app->bind(BlogsInterface::class, BlogsRepository::class);
        $this->app->bind(BlogChildInterface::class, BlogChildRepository::class);
        $this->app->bind(BannerInterface::class, BannerRepository::class);
        $this->app->bind(TestimonialInterface::class, TestimonialRepository::class);
        $this->app->bind(MenuInterface::class, MenuRepository::class);
        $this->app->bind(PageInterface::class, PageRepository::class);
        $this->app->bind(SettingInterface::class, SettingRepository::class);
        $this->app->bind(ContinentInterface::class, ContinentRepository::class);
        $this->app->bind(CountryInterface::class, CountryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
