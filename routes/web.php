<?php

use App\Http\Controllers\Admin\CompetitionController;
use App\Http\Controllers\Admin\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function() {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/dashboard', DashboardController::class);
        
        // Competitions
        Route::resource('/competitions', CompetitionController::class);
        Route::get('/competitions/{id}/detail', [CompetitionController::class, 'detail']);
    });
});