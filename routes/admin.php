<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController as admin_auth;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('admin.')->group(function (){
    Route::middleware('guest:admin')->group(function (){
        Route::get('/login', [admin_auth::class, 'create'])->name('login');
        Route::post('/login', [admin_auth::class, 'store'])->name('login');

    });
    Route::get('/dashboard', function (){
        return  view('admin.dashboard');
    })->middleware('admin');
    Route::get('/logout', [admin_auth::class, 'destroy'])->name('logout');
});

Route::get('test', function (){
    return view('admin.test');
});
