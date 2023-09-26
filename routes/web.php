<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::controller(DashboardController::class)->group(function (){
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/admin/add-product','add')->name('add-product');
        Route::post('/admin/store-product','store')->name('store-product');
        Route::get('/admin/change-status/{id}','change')->name('change-status');
        Route::get('/admin/details-product/{id}','detail')->name('details-product');
        Route::get('/admin/edit-product/{id}','edit')->name('edit-product');
        Route::post('/admin/update-product/{id}','update')->name('update-product');
        Route::get('/admin/delete-product/{id}','delete')->name('delete-product');
    });
});
