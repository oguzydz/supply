<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Request\RequestController;
use App\Http\Controllers\Dashboard\RequestsController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\BrandsController;
use App\Http\Controllers\QuotationController;

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
    Route::get('/filter/manufacturer/{id}', [RequestController::class, 'manufacturer'])->name('filterRequestManufacturer');
    Route::post('/filter', [RequestController::class, 'filter'])->name('filterRequest');

    Route::get('/quotation/show/{id}', [QuotationController::class, 'show'])->name('showQuotation');
    Route::get('/quotation/create/{id}', [QuotationController::class, 'create'])->name('createQuotation');
    Route::post('/quotation/store/{id}', [QuotationController::class, 'store'])->name('storeQuotation');
    
    Route::get('/show/{id}', [RequestController::class, 'show'])->name('showRequest');
    Route::get('/destroy/{id}', [RequestController::class, 'destroy'])->name('destroyRequest');
});

Route::prefix('dashboard')->middleware('admin')->group(function(){
    Route::get('/requests', [RequestsController::class, 'index'])->name('dashboard.requests');
    Route::get('/requests/show/{id}', [RequestsController::class, 'show'])->name('dashboard.requests.show');
    Route::get('/requests/edit/{id}', [RequestsController::class, 'edit'])->name('dashboard.requests.edit');
    Route::post('/requests/update/{id}', [RequestsController::class, 'update'])->name('dashboard.requests.update');


    Route::get('/users', [UsersController::class, 'index'])->name('dashboard.users');
    Route::get('/users/show/{id}', [UsersController::class, 'show'])->name('dashboard.users.show');
    Route::get('/users/destroy/{id}', [UsersController::class, 'destroy'])->name('dashboard.users.destroy');

    Route::get('/brands', [BrandsController::class, 'index'])->name('dashboard.brands');
    Route::get('/brands/destroy/{id}', [BrandsController::class, 'destroy'])->name('dashboard.brands.destroy');
    Route::get('/brands/show/{id}', [BrandsController::class, 'show'])->name('dashboard.brands.show');
    Route::get('/brands/edit/{id}', [BrandsController::class, 'edit'])->name('dashboard.brands.edit');
    Route::post('/brands/update/{id}', [BrandsController::class, 'update'])->name('dashboard.brands.update');
    Route::get('/brands/create/', [BrandsController::class, 'create'])->name('dashboard.brands.create');
    Route::post('/brands/store/', [BrandsController::class, 'store'])->name('dashboard.brands.store');
});