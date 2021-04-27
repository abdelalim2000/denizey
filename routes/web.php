<?php

use App\Http\Controllers\BatchController;
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

Route::group(['middleware' => ['auth', 'isSuperAdmin']], function () {
    Route::get('/', [BatchController::class, 'index'])->name('site.batch');
    Route::get('/reports/{id}', [BatchController::class, 'show'])->name('site.reports.show');
    Route::get('/report/show/{id}', [BatchController::class, 'showReport'])->name('site.reports.detail');
    Route::get('/report/pdf/{id}', [BatchController::class, 'reportPDF'])->name('site.reports.pdf');
    Route::get('/attendance/{id}', [BatchController::class, 'export'])->name('site.attendance.export');
});


Route::group(['prefix' => 'dashboard'], function () {
    Voyager::routes();
});

