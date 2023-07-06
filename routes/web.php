<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\ImageController;


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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::resource('projects', ProjectController::class);
Auth::routes(['register' => false]);

Route::get('contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('contact', [ContactController::class, 'send'])->name('contact.send');

Route::post('image_upload', [ImageController::class, 'store'])->name('images.store');
