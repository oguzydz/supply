<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Request\RequestController;
use App\Http\Controllers\Dashboard\RequestsController;
use App\Http\Controllers\Dashboard\UsersController;

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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/update', [ProfileController::class, 'update'])->name('profileUpdate');
});

Route::prefix('requests')->group(function () {
    Route::get('/', [RequestController::class, 'index'])->name('requests');
    Route::get('/my', [RequestController::class, 'myRequests'])->name('myRequests');
    Route::get('/create', [RequestController::class, 'create'])->name('createRequest');
    Route::post('/store', [RequestController::class, 'store'])->name('storeRequest');
    Route::get('/show/{id}', [RequestController::class, 'show'])->name('showRequest');
});

Route::prefix('dashboard')->middleware('admin')->group(function(){
    Route::get('/requests', [RequestsController::class, 'index'])->name('dashboard.requests');
    Route::get('/requests/detail/{id}', [RequestsController::class, 'detail'])->name('dashboard.requests.detail');
    Route::get('/requests/edit/{id}', [RequestsController::class, 'edit'])->name('dashboard.requests.edit');
    Route::post('/requests/update/{id}', [RequestsController::class, 'update'])->name('dashboard.requests.update');

    Route::get('/users', [UsersController::class, 'index'])->name('dashboard.users');
    Route::get('/users/detail/{id}', [UsersController::class, 'detail'])->name('dashboard.users.detail');
    Route::get('/users/remove/{id}', [UsersController::class, 'destroy'])->name('dashboard.users.remove');
});