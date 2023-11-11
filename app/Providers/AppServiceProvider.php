<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\Schema as ModelsSchema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        Gate::define('admin', function ($user) {
            if ($user->role == 'admin') {
                return true;
            }
            return false;
        });

        //Получаем настройки сайта (тип)
        view()->composer('*', function ($view) {
            $localizationFromDb = \App\Models\Localization::orderBy('id', 'ASC')->first();

            if ($localizationFromDb) {
                $localizationLink = session('admin_locale') != null ? session('admin_locale') : $localizationFromDb->code;
                $currentLocalization = \App\Models\Localization::where('code', $localizationLink)->first();
            } else {
                $localizationLink = NULL;
                $currentLocalization = null;
            }

            $view->with([
                'siteSettings' => \App\Models\SiteSetting::first(),
                'localizationList' => \App\Models\Localization::orderBy('id', 'ASC')->get(),
                'currentLocalization' => $currentLocalization,
                'pageTypes' => \App\Models\Page::PAGE_TYPES,
                'pageStatuses' => \App\Models\Page::PAGE_STATUSES,
                'categoriesNull' => \App\Models\GalleryCategory::whereNull('parent_id')->orderBy('name', 'ASC')->get(),
            ]);
        });

        Gate::define('content', function ($user) {
            if ($user->role == 'content') {
                return true;
            }
            return false;
        });

        //Выводим переменные которые относятся к Доменам
        view()->composer('admin.domains.*', function ($view) {
            $view->with([
                'status' => \App\Models\Localization::STATUS_MAP,
                'localizarionGroups' => \App\Models\Group::all()
            ]);
        });

        view()->composer('admin.file-manager.index', function ($view) {
            $localeId = session('locale_id') != null ? session('locale_id') : \App\Models\Localization::defaultDomain();

            $view->with([
                'files' => \App\Models\Gallery::where('locale_id', $localeId)->latest()->get(),
                'categories' => \App\Models\GalleryCategory::latest()->get(),
                'galleryCategories' => \App\Models\GalleryCategory::whereNull('parent_id')->latest()->get(),
                'categoriesNull' => \App\Models\GalleryCategory::whereNull('parent_id')->orderBy('name', 'ASC')->get(),
            ]);
        });

        view()->composer('admin.form-appends.brands', function ($view) {
            $domainCode = session('locale_id') != null ? session('locale_id') : \App\Models\Localization::defaultDomainCode(); //Получаем код текущего языка
            $domain = \App\Models\Localization::where('code', $domainCode)->first(); //Получаем id код текущего языка

            $view->with([
                'brands' => \App\Models\Brand::where('locale_id', $domain->id)->orderBy('name', 'ASC')->get()
            ]);
        });

        //for frontend

        view()->composer('frontend.*', function ($view) {
            $domainName = request()->getHost(); //Получаем текущего текущий домен
            $domain = \App\Models\Localization::where('locale_name', $domainName)->first(); //Получаем id код текущего языка

            if (!$domain) {
                $domain = \App\Models\Localization::first();
            }

            $view->with([
                'domain' => $domain,
                'domains' => \App\Models\Localization::whereNotNull('group_id')->where('group_id', $domain->group_id)->orderBy('locale_name', 'ASC')->get(),
                'slug' => request()->path(),
                'settings' => \App\Models\DefaultSetting::where('locale_id', $domain->id)->first(),
                'organization' => ModelsSchema::where(['locale_id' => $domain->id, 'schema_type' => 'organization'])->first(),
                'partners' => \App\Models\Partner::where('locale_id', $domain->id)->latest()->get(),
                'articles' => \App\Models\Page::where(['locale_id' => $domain->id, 'type' => \App\Models\Page::ARTICLE_PAGE])->limit(5)->latest()->get(),
                'articlesCount' => \App\Models\Page::where(['locale_id' => $domain->id, 'type' => \App\Models\Page::ARTICLE_PAGE])->count(),
                'design_settings' => \App\Models\DesignSetting::where('locale_id', $domain->id)->first()
            ]);
        });
    }
}
