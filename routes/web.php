<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', 'login');

Route::group(['middleware' => ['web', 'guest']], function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('connect', [AuthController::class, 'connect'])->name('connect');
});

Route::group(['middleware' => ['web', 'MsGraphAuthenticated'], 'prefix' => 'auth'], function(){

    Route::get('/microsoft/oauth2-callback', [PagesController::class, 'app'])->name('app');
    Route::get('emails', [PagesController::class, 'emails'])->name('emails');
    Route::get('all-emails', [PagesController::class, 'getAllEmails'])->name('all-emails');
    Route::get('compose-email', [PagesController::class, 'composeEmail'])->name('compose-email');
    Route::post('send-email', [PagesController::class, 'sendEmail'])->name('send-email');
    Route::get('detail-email/{id}', [PagesController::class, 'show'])->name('detail-email');

    Route::get('/microsoft/oauth2-logout', [AuthController::class, 'logout'])->name('logout');
});
