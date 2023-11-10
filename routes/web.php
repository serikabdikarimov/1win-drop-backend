<?php

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
$siteType = SiteSetting::pluck('site_type')->first();

Route::get('/captcha_image', [App\Http\Controllers\CaptchaController::class, 'generateCaptchaImage']);

if ($siteType === 'multi_domain') {
    Route::middleware('webdomain')->group(function () {
        Route::get('/', [App\Http\Controllers\Frontend\PagesController::class, 'homePage'])->name('home-page');
        Route::get('/sitemap.xml', [App\Http\Controllers\Frontend\SitemapController::class, 'index'])->name('index');
        Route::get('/robots.txt', [App\Http\Controllers\Frontend\RobotsController::class, 'robots'])->name('robots');
        Route::get('manifest.webmanifest', [App\Http\Controllers\Frontend\RobotsController::class, 'manifest']);
        Route::get('/search', [App\Http\Controllers\Frontend\SearchController::class, 'search'])->name('search');
        Route::get('/contacts', [App\Http\Controllers\Frontend\PagesController::class, 'contacts'])->name('contacts');
        Route::post('/contacts', [App\Http\Controllers\Frontend\PagesController::class, 'sendMessage'])->name('contacts.send-message');
        Route::post('/subscribe', [App\Http\Controllers\Frontend\PagesController::class, 'subscribe'])->name('subscribe');

        Route::post('/user-favorites', [App\Http\Controllers\Frontend\PagesController::class, 'userFavorites'])->name('user.favorites')->middleware('auth');
        Route::post('/send-review/{brandId}', [App\Http\Controllers\Frontend\PagesController::class, 'sendReview'])->name('user.review')->middleware('auth');

        //Страница пользователя
        // Route::get('/profile', [App\Http\Controllers\Auth\LoginController::class, 'profile'])->name('profile')->middleware('auth');
        // Route::post('/update-profile', [App\Http\Controllers\Auth\LoginController::class, 'updateProfile'])->name('profile.update')->middleware('auth');
        // Route::post('/update-avatar', [App\Http\Controllers\Auth\LoginController::class, 'updateAvatar'])->name('profile.avatar.update')->middleware('auth');
        // Route::get('/delete-avatar', [App\Http\Controllers\Auth\LoginController::class, 'deleteAvatar'])->name('profile.avatar.delete')->middleware('auth');

        // Route::get('/profile/favorites', [App\Http\Controllers\Auth\LoginController::class, 'favorites'])->name('profile.favorites')->middleware('auth');
        // Route::post('/profile/favorites', [App\Http\Controllers\Auth\LoginController::class, 'updateFavorites'])->name('profile.favorites.update')->middleware('auth');

        // Route::get('/profile/settings', [App\Http\Controllers\Auth\LoginController::class, 'settings'])->name('profile.settings')->middleware('auth');
        // Route::post('/profile/settings', [App\Http\Controllers\Auth\LoginController::class, 'updateSettings'])->name('profile.update.settings')->middleware('auth');

        //Все страницы
        Route::get('/{slug}', [App\Http\Controllers\Frontend\PagesController::class, 'page'])->name('page');

    });
} elseif ($siteType === 'multi_language') {
    Route::prefix('{language}')->group(function () {
        // Здесь определите роуты для мультиязычного сайта
    });
}
