<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function () {
    // Ваши маршруты административной панели
    Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'authorization'])->name('authorization');
});

Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    // Ваши маршруты административной панели
    Route::get('/site-settings', [App\Http\Controllers\Admin\SiteSettingsController::class, 'index'])->name('site-settings.index');
    Route::post('/site-settings', [App\Http\Controllers\Admin\SiteSettingsController::class, 'store'])->name('site-settings.store');
    Route::get('/site-settings/multi-domain', [App\Http\Controllers\Admin\SiteSettingsController::class, 'multiDomain'])->name('site-settings.domain');
    Route::get('/site-settings/multi-lang', [App\Http\Controllers\Admin\SiteSettingsController::class, 'emultiLomain'])->name('site-settings.lang');
});

Route::middleware(['admin', 'checkSiteSettings'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('localizations', App\Http\Controllers\Admin\LocalizationsController::class)->except(['show']);

    Route::post('set-locale', [App\Http\Controllers\Admin\LocaleController::class, 'setLocale']); //Локализация сайта в адмиин панели
    //Route::resource('domains', App\Http\Controllers\Admin\DomainsController::class)->except(['show']);
    Route::resource('menu-categories', App\Http\Controllers\Admin\MenuCategoriesController::class)->except(['show']);
    Route::resource('menu-items', App\Http\Controllers\Admin\MenuItemsController::class)->except(['show']);
    Route::post('menu-items/position/{id}/update', [App\Http\Controllers\Admin\MenuItemsController::class, 'updatePosition']);

    //Модальное окно и файл менеджер
    Route::post('upload-image',[App\Http\Controllers\Admin\FileManagerController::class, 'upload'])->name('img-upload');
    Route::post('find-image', [App\Http\Controllers\Admin\FileManagerController::class, 'findImage'])->name('find-image');
    Route::post('add-block', [App\Http\Controllers\Admin\FileManagerController::class, 'addBlock'])->name('add-block');
    //Галерея
    Route::resource('gallery-categories', App\Http\Controllers\Admin\GalleryCategoriesController::class)->except(['show']);
    Route::post('save-category', [App\Http\Controllers\Admin\GalleryCategoriesController::class, 'saveCategory'])->name('save-category');
    
    Route::resource('gallery', App\Http\Controllers\Admin\GalleryController::class)->except(['show']);
    Route::post('image-attributes', [App\Http\Controllers\Admin\FileManagerController::class, 'imageAttributes'])->name('image-attributes');

    //Атрибуты брендов и их значения
    Route::resource('attributes', App\Http\Controllers\Admin\AttributesController::class)->except(['show']);
    Route::get('attribute-items', [App\Http\Controllers\Admin\AttributesController::class, 'attributeItems']);
    Route::resource('attributes/{attributeId}/attribute-items', App\Http\Controllers\Admin\AttributeItemsController::class)->except(['show']);

    Route::resource('brands', App\Http\Controllers\Admin\BrandsController::class)->except(['show']);
    Route::post('brands/copy-page', [\App\Http\Controllers\Admin\BrandsController::class, 'copyPage']);

    //CRUD сопутствующих брендов
    Route::get('brands/{brandId}/recomended-brands', [App\Http\Controllers\Admin\BrandsController::class, 'editRecomendedBrands']);
    Route::post('brands/{brandId}/update-recomended-brands', [App\Http\Controllers\Admin\BrandsController::class, 'updateRecomendedBrands']);
    Route::delete('brands/{brandId}/delete-recomended-brands/{recomendedBrandId}', [App\Http\Controllers\Admin\BrandsController::class, 'deleteRecomendedBrands']);
    Route::post('brands/recomended-brands/position-update', [App\Http\Controllers\Admin\BrandsController::class, 'updateRecomendedBrandsPosition']);
    
    Route::post('find-image', [App\Http\Controllers\Admin\FileManagerController::class, 'findImage'])->name('find-image');
    Route::post('add-block', [App\Http\Controllers\Admin\FileManagerController::class, 'addBlock'])->name('add-block');

    //Все что касается страниц
    Route::resource('pages', App\Http\Controllers\Admin\PagesController::class)->except(['show']);
    Route::post('pages/copy-page', [\App\Http\Controllers\Admin\PagesController::class, 'copyPage']);
    Route::get('pages/{pageId}/edit-seo', [App\Http\Controllers\Admin\PagesController::class, 'editSeo']);
    Route::patch('pages/{pageId}/update-seo', [App\Http\Controllers\Admin\PagesController::class, 'updateSeo']);
    Route::get('pages/get-type-content', [App\Http\Controllers\Admin\PagesController::class, 'getTypeContent']);

    Route::get('pages/{pageId}/slider', [App\Http\Controllers\Admin\SliderController::class, 'edit']);
    Route::patch('pages/{pageId}/slider', [App\Http\Controllers\Admin\SliderController::class, 'update']);

    Route::resource('reviews', App\Http\Controllers\Admin\ReviewsController::class)->except(['show']);
    //CRUD витрины
    Route::get('pages/{pageId}/showcase', [App\Http\Controllers\Admin\PagesController::class, 'editShowcase']);
    Route::post('pages/{pageId}/update-showcase', [App\Http\Controllers\Admin\PagesController::class, 'updateShowcase']);
    Route::delete('pages/{pageId}/delete-showcase/{brandId}', [App\Http\Controllers\Admin\PagesController::class, 'deleteShowcaseBrand']);
    Route::post('pages/shocase/position-update', [App\Http\Controllers\Admin\PagesController::class, 'updateBrandPosition']);
    Route::post('api-update-status', [App\Http\Controllers\Admin\PagesController::class, 'updateStatus']);

    Route::resource('subscribers', App\Http\Controllers\Admin\SubscribersController::class)->except(['show', 'edit', 'update']);
    
    //Схемы организация
    Route::get('schema', [App\Http\Controllers\Admin\SchemasController::class, 'index']);
    Route::post('schema', [App\Http\Controllers\Admin\SchemasController::class, 'update']);

    Route::get('htaccess', [App\Http\Controllers\Admin\HtaccessController::class, 'index']);
    Route::patch('htaccess', [App\Http\Controllers\Admin\HtaccessController::class, 'update']);

    //Словарь
    Route::resource('dictionary', App\Http\Controllers\Admin\DictionaryController::class)->except(['show']);

    Route::resource('autors', App\Http\Controllers\Admin\AutorsController::class);
    Route::resource('comments', App\Http\Controllers\Admin\CommentsController::class);

    Route::get('social', [App\Http\Controllers\Admin\SocialController::class, 'edit']);
    Route::patch('social', [App\Http\Controllers\Admin\SocialController::class, 'update']);

    //Настройки сайтов
    Route::get('default-settings', [App\Http\Controllers\Admin\DefaultSettingsController::class, 'index']);
    Route::get('design-settings', [App\Http\Controllers\Admin\DesignSettingsController::class, 'edit']);
    Route::patch('design-settings', [App\Http\Controllers\Admin\DesignSettingsController::class, 'update']);
    
    //robots
    Route::get('default-settings/robots/{domainId}/edit', [App\Http\Controllers\Admin\DefaultSettingsController::class, 'robotsEdit']);
    Route::patch('default-settings/robots/{domainId}/update', [App\Http\Controllers\Admin\DefaultSettingsController::class, 'robotsUpdate']);
    
    Route::post('default-settings', [App\Http\Controllers\Admin\DefaultSettingsController::class, 'store']);
    Route::get('default-settings/{domainId}/edit', [App\Http\Controllers\Admin\DefaultSettingsController::class, 'edit']);
    Route::patch('default-settings/{domainId}/update', [App\Http\Controllers\Admin\DefaultSettingsController::class, 'update']);

    Route::resource('partners', App\Http\Controllers\Admin\PartnersController::class)->except(['show']);
    Route::resource('users', App\Http\Controllers\Admin\UsersController::class)->except(['show']);
    Route::resource('groups', App\Http\Controllers\Admin\GroupsController::class)->except(['show']);
});