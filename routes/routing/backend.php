<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Ckeditor\CkeditorController;
use App\Http\Controllers\Backend\Ajax\AjaxController;


Route::group(['namespace' => 'Backend', 'prefix' => 'company-backend', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/contact-list', [DashboardController::class, 'contact'])->name('contact-list');
    Route::get('/contact-delete/{id}', [DashboardController::class, 'deleteContact'])->name('contact-delete');
    Route::get('/resume-list', [DashboardController::class, 'resume_list'])->name('resume-list');
    Route::get('/resume-delete/{id}', [DashboardController::class, 'deleteResume'])->name('resume-delete');

    require_once dirname(__FILE__) . '/role/role.php';
    require_once dirname(__FILE__) . '/permission/permission.php';
    require_once dirname(__FILE__) . '/account/account-type.php';
    require_once dirname(__FILE__) . '/account/admin.php';
    require_once dirname(__FILE__) . '/profile/profile.php';
    require_once dirname(__FILE__) . '/member-type/member-type.php';
    require_once dirname(__FILE__) . '/employer/employer.php';
    require_once dirname(__FILE__) . '/team/team.php';
    require_once dirname(__FILE__) . '/activity/activity.php';
    require_once dirname(__FILE__) . '/blog/blog.php';
    require_once dirname(__FILE__) . '/banner/banner.php';
    require_once dirname(__FILE__) . '/testimonial/testimonial.php';
    require_once dirname(__FILE__) . '/faq/faq.php';
    require_once dirname(__FILE__) . '/menu/menu.php';
    require_once dirname(__FILE__) . '/page/page.php';
    require_once dirname(__FILE__) . '/setting/setting.php';
    require_once dirname(__FILE__) . '/address/address.php';

    require_once dirname(__FILE__) . '/job/job_category.php';
    require_once dirname(__FILE__) . '/job/job-type.php';
    require_once dirname(__FILE__) . '/job/job.php';
    require_once dirname(__FILE__) . '/job/skills.php';
    require_once dirname(__FILE__) . '/job/job-levels.php';
    require_once dirname(__FILE__) . '/job/education.php';
    require_once dirname(__FILE__) . '/job/experience.php';

    Route::post('ckeditor-image-upload', [CkeditorController::class, 'index'])->name('ckeditor-image-upload');
    Route::resource('manage-category', "\App\Http\Controllers\Backend\Blogs\BlogCategoryController");
    Route::group(['prefix' => 'manage-ajax'], function () {
        Route::get('get-ajax-category', [AjaxController::class, 'getAjaxCategory'])->name('get-ajax-category');
        Route::post('get-ajax-category', [AjaxController::class, 'setAjaxCategory'])->name('get-ajax-category');
        Route::post('ajax-file-manage', [AjaxController::class, 'ajaxFileManage'])->name('ajax-file-manage');
    });
});
