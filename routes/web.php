<?php

use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MachineLearningController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ResultController;

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

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::get('register/create', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('dashboard');
});

Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::post('/upload-image', [ImageController::class, 'uploadImage']);

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/history', [HistoryController::class, 'index'])->name('history');

Route::get('/predict', [MachineLearningController::class, 'showForm']);
Route::post('/predict', [MachineLearningController::class, 'predictFromForm']);

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/result', [ResultController::class, 'index'])->name('result');
