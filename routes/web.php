<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MailController;

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

//Installer Routes
Route::get('/installer', function () {
    if (file_exists(storage_path('installed'))) {
        return redirect()->route('home');
    } else {
        return view('installer.index');
    }
})->name('installer');

Route::middleware(['verify.install'])->group(function () {
    Route::post('unlock', [AppController::class, 'unlock'])->name('unlock');
    Route::middleware('lock')->group(function () {
        Route::get('/', [AppController::class, 'load'])->name('home');
        Route::get('/tempmail-login', [UserLoginController::class, 'index'])->name('userlogin');
        Route::get('/tempmail-signup', [UserLoginController::class, 'signup'])->name('usersignup');
        //App Routes
        Route::get('Temp-Mail/{email?}', [AppController::class, 'mailbox'])->name('mailbox');
        Route::get('message/{messageId}', [AppController::class, 'message'])->name('message');
        Route::get('switch/{email}', [AppController::class, 'switch'])->name('switch');
        //Locale
        Route::post('locale/{locale}', [AppController::class, 'locale'])->name('locale');

        // profile section
        Route::get('tempmail-profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('check_login', [ProfileController::class, 'checkLogin'])->name('checkLogin');
    });



    //Admin User Routes
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::get('/', function () {
            return redirect()->route('dashboard');
        })->name('admin');
        Route::get('/dashboard', function () {
            return view('backend.dashboard');
        })->name('dashboard');
        Route::get('/settings', function () {
            return view('backend.settings.index');
        })->name('settings');
        Route::get('/menu', function () {
            return view('backend.menu.index');
        })->name('menu');
        Route::get('/pages', function () {
            return view('backend.pages.index');
        })->name('pages');
        Route::get('/category', function () {
            return view('backend.category.index');
        })->name('category');
        Route::get('/blog', function () {
            return view('backend.blog.index');
        })->name('blog');
        Route::get('/themes', function () {
            return view('backend.themes.index');
        })->name('themes');
        Route::get('/update', function () {
            return view('backend.update.index');
        })->name('update');
        Route::get('/mails', [MailController::class, 'index'])->name('mails');
        Route::get('/mail/{id}', [MailController::class, 'edit'])->name('mail.edit');
        Route::put('/mail/{id}', [MailController::class, 'update'])->name('mail.update');
        Route::get('/mail/login/{email}', [MailController::class, 'login'])->name('mail.login');
    });
    //Auto Sitemap
    Route::get('sitemap.xml', [AppController::class, 'sitemap']);

    //Blog
    Route::get('blog', [BlogController::class, 'index']);
    Route::get('blog/{blog:slug}', [BlogController::class, 'details'])->name('blogDetails');
    //Page Routes
    Route::get('{slug}/{inner?}', [AppController::class, 'page'])->middleware('lock')->name('page');
});




Route::post('logouta', [AppController::class, 'appLogout'])->name('appLogout');
