<?php

use App\Http\Controllers\Admin\CompetitionCategoryController;
use App\Http\Controllers\Admin\CompetitionCompetitor;
use App\Http\Controllers\Admin\CompetitionController;
use App\Http\Controllers\Admin\CompetitionItemController;
use App\Http\Controllers\Admin\CompetitionRoundController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Home\CompetitionController as HomeCompetitionController;
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

    Route::get('/auth/signup', [SignupController::class, 'index'])->name('signup');
    Route::post('/auth/signup', [SignupController::class, 'register']);
});
Route::post('/logout', LogoutController::class);

Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');
    
    // Competitions
    Route::resource('/competitions', CompetitionController::class);
    Route::get('/competitions/{id}/detail', [CompetitionController::class, 'detail']);
    // Competition Round
    Route::resource('/competitions/rounds', CompetitionRoundController::class);
    // Competition Item
    Route::resource('/competitions/items', CompetitionItemController::class);
    // Competition Competitor
    Route::get('/competitions/competitor/{id}/edit', [CompetitionCompetitor::class, 'edit']);
    Route::delete('/competitions/competitor/{id}', [CompetitionCompetitor::class, 'destroy']);
    
    // Competition Category
    Route::resource('/categories/competitions', CompetitionCategoryController::class);


});


// Route home page
Route::get('/', HomeController::class)->name('home');
Route::middleware('auth')->group(function() {
    Route::get('/competitions/{slug}', [HomeCompetitionController::class, 'detail']);
    Route::post('/competitions/{slug}/register', [HomeCompetitionController::class, 'registerComp']);
});



/**
 * socialite auth
 */
Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);