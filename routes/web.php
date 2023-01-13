<?php

use App\Http\Controllers\Admin\CompetitionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Home\HomeController;
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

Route::middleware('guest')->group(function() {
    Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
    Route::post('/auth/login', [LoginController::class, 'login']);
});
Route::post('/logout', LogoutController::class);

Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');
    
    // Competitions
    Route::resource('/competitions', CompetitionController::class);
    Route::get('/competitions/{id}/detail', [CompetitionController::class, 'detail']);

});


// Route homepage
Route::get('/home', HomeController::class)->name('home');