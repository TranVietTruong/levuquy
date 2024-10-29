<?php

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

Route::get('/', function () {
    $templates = \App\Models\Template::where('status', 1)->orderBy('order')->get();
    return view('pages.index', [
        'templates' => $templates
    ]);
})->name('home');


Route::group(['middleware' => 'guest'], function() {
    Route::get('/login', function () {
        return view('pages.login');
    })->name('login');

    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('postLogin');
});

Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'auth'], function() {
    Route::get('/cms', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::get('/chon-mau', function () {
        return view('pages.template');
    })->name('template');

    Route::get('/thong-tin-co-dau-chu-re', function () {
        return view('pages.couple');
    })->name('couple-information');

    Route::get('/thong-tin-website', function () {
        return view('pages.website');
    })->name('website-information');

    Route::get('/su-kien-cuoi', function () {
        return view('pages.sukiencuoi');
    })->name('event');

    Route::get('/cau-chuyen-tinh-yeu', function () {
        return view('pages.love-story');
    })->name('love-story');

    Route::get('/phu-dau-phu-re', function () {
        return view('pages.phudau');
    })->name('phu-dau');

    Route::get('/albums', function () {
        return view('pages.album');
    })->name('album');

    Route::get('/loi-cam-ta', function () {
        return view('pages.loi-cam-ta');
    })->name('loi-cam-ta');

    Route::get('/tuy-chinh-giao-dien', function () {
        $website = \App\Models\WebsiteInformation::where('user_id', auth()->user()->id)->first();
        return view('pages.setup')->with(['website' => $website]);
    })->name('tuy-chinh-giao-dien');

    Route::post('/upload', [\App\Http\Controllers\UploadController::class, 'store'])->name('upload');

    Route::get('/api-thong-tin-co-dau-chu-re', [\App\Http\Controllers\CoupleController::class, 'index'])->name('get-couple-information');
    Route::post('/thong-tin-co-dau-chu-re', [\App\Http\Controllers\CoupleController::class, 'store'])->name('post-couple-information');

    Route::get('/api-thong-tin-website', [\App\Http\Controllers\WebsiteController::class, 'index'])->name('get-website-information');
    Route::post('/thong-tin-website', [\App\Http\Controllers\WebsiteController::class, 'store'])->name('post-website-information');

    Route::get('/api-su-kien-cuoi', [\App\Http\Controllers\SukienCuoiController::class, 'index'])->name('get-event');
    Route::post('/su-kien-cuoi', [\App\Http\Controllers\SukienCuoiController::class, 'store'])->name('post-event');

    Route::get('/api-cau-chuyen-tinh-yeu', [\App\Http\Controllers\LoveStoryController::class, 'index'])->name('get-love-story');
    Route::post('/cau-chuyen-tinh-yeu', [\App\Http\Controllers\LoveStoryController::class, 'store'])->name('post-love-story');

    Route::get('/api-phu-dau', [\App\Http\Controllers\PhuDauController::class, 'index'])->name('get-phu-dau');
    Route::post('/phu-dau', [\App\Http\Controllers\PhuDauController::class, 'store'])->name('post-phu-dau');

    Route::get('/api-album', [\App\Http\Controllers\AlbumController::class, 'index'])->name('get-album');
    Route::post('/album', [\App\Http\Controllers\AlbumController::class, 'store'])->name('post-album');
    Route::post('/album-update', [\App\Http\Controllers\AlbumController::class, 'update'])->name('update-album');
    Route::post('/album-delete', [\App\Http\Controllers\AlbumController::class, 'delete'])->name('delete-album');

    Route::get('/get-loi-cam-ta', [\App\Http\Controllers\LoiCamTaController::class, 'index'])->name('get-loi-cam-ta');
    Route::post('/loi-cam-ta', [\App\Http\Controllers\LoiCamTaController::class, 'store'])->name('post-loi-cam-ta');

    Route::get('/templates', [\App\Http\Controllers\TemplateController::class, 'index'])->name('get-template');
    Route::post('/templates', [\App\Http\Controllers\TemplateController::class, 'store'])->name('post-template');

    Route::get('/setup', [\App\Http\Controllers\SetupController::class, 'index'])->name('get-setup');
    Route::post('/setup', [\App\Http\Controllers\SetupController::class, 'store'])->name('post-setup');
});
