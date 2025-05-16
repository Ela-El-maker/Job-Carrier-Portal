<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogSectionSettingController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ClearDatabaseController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CustomPageBuilderController;
use App\Http\Controllers\Admin\CustomSectionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\IndustryTypeController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\JobExperienceController;
use App\Http\Controllers\Admin\JobRoleController;
use App\Http\Controllers\Admin\JobTypeController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\MenuBuilderController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrganizationTypeController;
use App\Http\Controllers\Admin\PaymentSettingController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ProfessionController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\RoleUserController;
use App\Http\Controllers\Admin\SalaryTypeController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SocialIconController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\SystemUserController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UploadController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {


    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    /**** Dashboard Route */
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('analytics/user-registrations', [DashboardController::class, 'userRegistrations'])->name('analytics.user-registrations');
    Route::get('analytics/earnings', [DashboardController::class, 'earnings'])->name('analytics.earnings');
    Route::get('analytics/growth-comparison', [DashboardController::class, 'growthComparison'])->name('analytics.growth-comparison');
    Route::get('analytics/candidates', [DashboardController::class, 'candidateAnalytics'])->name('analytics.candidates');
    Route::get('analytics/job-status', [DashboardController::class, 'jobStatusAnalytics'])->name('analytics.job-status');
    Route::get('analytics/blogs', [DashboardController::class, 'blogAnalytics'])->name('analytics.blogs');




    /**** Industry Type Route */
    Route::resource('industry-types', IndustryTypeController::class);
    /**** Organization Type Route */
    Route::resource('organization-types', OrganizationTypeController::class);
    /**** Countries Route */
    Route::resource('countries', CountryController::class);

    /**** States Route */
    Route::resource('states', StateController::class);
    /**** Cities Route */
    Route::resource('cities', CityController::class);

    Route::get('get-states/{country_id}', [LocationController::class, 'getStatesOfCountry'])->name('get-states');

    /**** Langauage Route */
    Route::resource('languages', LanguageController::class);

    /**** Profession Route */
    Route::resource('professions', ProfessionController::class);

    /**** Skill Route */
    Route::resource('skills', SkillController::class);

    /**** Plan Route */
    Route::resource('plans', PlanController::class);

    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('order/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('order/invoice/{id}', [OrderController::class, 'invoice'])->name('orders.invoice');

    /**
     * Page Builder
     */
    Route::resource('page-builder', CustomPageBuilderController::class);
    Route::post('page-builder-status/{id}', [CustomPageBuilderController::class, 'changeStatus'])->name('page-builder-status.update');


    Route::get('newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
    Route::delete('newsletter/{id}', [NewsletterController::class, 'destroy'])->name('newsletter.destroy');
    Route::post('newsletter', [NewsletterController::class, 'sendMail'])->name('newsletter.send-mail');


    Route::resource('social-icon', SocialIconController::class);
    Route::post('social-icon-status/{id}', [SocialIconController::class, 'changeStatus'])->name('social-icon-status.update');


    /**
     * Footer Route
     */
    Route::resource('footer', FooterController::class);

    /***
     * MEnu Builder Route
     */
    Route::resource('menu-builder', MenuBuilderController::class);

    /**
     * Job Categories
     */
    Route::resource('job-categories', JobCategoryController::class);

    /**
     * Education Route
     */
    Route::resource('educations', EducationController::class);

    /**
     * Job Type
     */
    Route::resource('job-type', JobTypeController::class);

    /**
     * Job Role Route
     */
    Route::resource('job-role', JobRoleController::class);

    /**
     * Job Experiences Route
     */
    Route::resource('job-experience', JobExperienceController::class);

    /**
     * Salary Type
     */
    Route::resource('salary-type', SalaryTypeController::class);

    /**
     * Tags Type
     */
    Route::resource('tag', TagController::class);


    /**
     * Jobs Route Section
     */
    Route::post('job-status/{id}', [JobController::class, 'changeStatus'])->name('job-status.update');
    Route::resource('jobs', JobController::class);




    /**Payment Setting Route Section */
    Route::get('payment-settings', [PaymentSettingController::class, 'index'])->name('payment-settings.index');

    Route::post('paypal-settings', [PaymentSettingController::class, 'updatePaypalSetting'])->name('paypal-settings.update');

    /**Site Setting Route Section */
    Route::get('site-settings', [SiteSettingController::class, 'index'])->name('site-settings.index');

    Route::post('general-settings', [SiteSettingController::class, 'updateGeneralSetting'])->name('general-settings.update');


    /***
     * Blogs
     */

    Route::resource('blogs', BlogController::class);

    // ✅ Custom (specific) routes first
    Route::get('users/candidates', [SystemUserController::class, 'candidates'])->name('users.candidates');
    Route::get('users/companies', [SystemUserController::class, 'companies'])->name('users.companies');

    // ✅ Then general CRUD routes
    Route::get('users', [SystemUserController::class, 'index'])->name('users.index');
    Route::get('users/create', [SystemUserController::class, 'create'])->name('users.create');
    Route::post('users', [SystemUserController::class, 'store'])->name('users.store');
    Route::get('users/{user}', [SystemUserController::class, 'show'])->name('users.show');
    Route::get('users/{user}/edit', [SystemUserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [SystemUserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [SystemUserController::class, 'destroy'])->name('users.destroy');


    /**
     * Home Frontend Route
     */
    Route::resource('about-us', AboutController::class);
    Route::resource('hero', HeroController::class);
    Route::resource('blog-section-setting', BlogSectionSettingController::class);
    Route::resource('custom-section', CustomSectionController::class);
    Route::resource('reviews', ClientReviewController::class);
    Route::post('review-status/{id}', [ClientReviewController::class, 'changeStatus'])->name('review-status.update');



    /***
     *
     * Database Delete Controller
     */
    Route::get('clear-database', [ClearDatabaseController::class, 'index'])->name('clear-database.index');
    Route::post('clear-database', [ClearDatabaseController::class, 'clearDatabase'])->name('clear-database');


    /**
     * Upload Controller Route
     */
    Route::post('/upload/image', [UploadController::class, 'storeImage'])->name('upload.image');

    /***
     *
     * Role Permissions Route
     */

    Route::resource('role', RolePermissionController::class);
    Route::resource('role-user', RoleUserController::class);
});
