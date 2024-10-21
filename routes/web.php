<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\PostTaskController;
use App\Http\Controllers\Admin\SubBannerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => ['site_settings']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/gioi-thieu', [App\Http\Controllers\AboutController::class, 'show'])->name('about');
    Route::get('/lien-he', [App\Http\Controllers\ContactController::class, 'show'])->name('contact');
    Route::post('/lien-he', [App\Http\Controllers\ContactController::class, 'store'])->name('contact-store');
    Route::get('/tu-sach', [App\Http\Controllers\BookController::class, 'list'])->name('books');
    Route::get('/tu-sach/{slug}', [App\Http\Controllers\BookController::class, 'show'])->name('detail-book');
    Route::get('/su-kien', [App\Http\Controllers\EventController::class, 'list'])->name('event');
    Route::get('/su-kien/{slug}', [App\Http\Controllers\EventController::class, 'show'])->name('detail-event');
});


Route::group(['prefix' => 'sb-admin', 'middleware' => 'auth'], function () {

    Route::group(array('namespace' => 'Admin'), function() {

        // Route::post('/upload/post-image', 'PostTaskController@uploadImage')->name('upload-post-image');
        Route::post('/upload/post-tinymce-image', [PostTaskController::class, 'uploadTinyMCEImage'])->name('upload-post-image');

        Route::get('/', [DashboardController::class, 'index'])->name('manage');

        // Banner
        Route::group(['prefix' => 'banner'], function () {
            Route::get('/', [BannerController::class, 'index'])->name('list-banner');
            Route::get('create', [BannerController::class, 'create'])->name('create-banner');
            Route::post('store', [BannerController::class, 'store'])->name('store-banner');
            Route::get('edit/{id}', [BannerController::class, 'edit'])->name('edit-banner');
            Route::put('update/{id}', [BannerController::class, 'update'])->name('update-banner');
            Route::get('delete-row', [BannerController::class, 'delete'])->name('delete-banner');
            Route::get('change-status', [BannerController::class, 'changeStatus'])->name('change-banner-status');
        });

        // Sub Banner
        Route::group(['prefix' => 'sub-banner'], function () {
            Route::get('/', [SubBannerController::class, 'index'])->name('list-sub-banner');
            Route::get('create', [SubBannerController::class, 'create'])->name('create-sub-banner');
            Route::post('store', [SubBannerController::class, 'store'])->name('store-sub-banner');
            Route::get('edit/{id}', [SubBannerController::class, 'edit'])->name('edit-sub-banner');
            Route::put('update/{id}', [SubBannerController::class, 'update'])->name('update-sub-banner');
            Route::get('delete-row', [SubBannerController::class, 'delete'])->name('delete-sub-banner');
            Route::get('change-status', [SubBannerController::class, 'changeStatus'])->name('change-sub-banner-status');
        });

        // Event
        Route::group(['prefix' => 'event'], function () {
            Route::get('/', [EventController::class, 'index'])->name('list-event');
            Route::get('create', [EventController::class, 'create'])->name('create-event');
            Route::post('store', [EventController::class, 'store'])->name('store-event');
            Route::get('edit/{id}', [EventController::class, 'edit'])->name('edit-event');
            Route::put('update/{id}', [EventController::class, 'update'])->name('update-event');
            Route::get('delete-row', [EventController::class, 'delete'])->name('delete-event');
            Route::get('change-status', [EventController::class, 'changeStatus'])->name('change-event-status');
        });

        // Information
        Route::group(['prefix' => 'information'], function () {
            Route::get('/', [InformationController::class, 'index'])->name('list-information');
            Route::get('create', [InformationController::class, 'create'])->name('create-information');
            Route::post('store', [InformationController::class, 'store'])->name('store-information');
            Route::get('edit/{id}', [InformationController::class, 'edit'])->name('edit-information');
            Route::put('update/{id}', [InformationController::class, 'update'])->name('update-information');
            Route::get('delete-row', [InformationController::class, 'delete'])->name('delete-information');
            Route::get('change-status', [InformationController::class, 'changeStatus'])->name('change-information-status');
        });

        // Book
        Route::get('book', [BookController::class, 'index'])->name('list-book');
        Route::get('book/create', [BookController::class, 'create'])->name('create-book');
        Route::post('book/store', [BookController::class, 'store'])->name('store-book');
        Route::get('book/edit/{id}', [BookController::class, 'edit'])->name('edit-book');
        Route::put('book/update/{id}', [BookController::class, 'update'])->name('update-book');
        Route::get('book/delete-row', [BookController::class, 'delete'])->name('delete-book');
        Route::get('book/change-status', [BookController::class, 'changeStatus'])->name('change-book-status');
    });
});

