<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CustomController;
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

Route::redirect('/', '/home');
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
//Route::get('/registration', [CustomAuthController::class, 'registration'])->name('register-user');
//Route::post('/custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('/signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('/home', [CustomController::class, 'home'])->name('home');
Route::get('/zavody', [CustomController::class, 'zavody'])->name('zavody');
Route::get('/zavod/{zav_id}', [CustomController::class, 'zavod'])->name('zavod')->where('zav_id', '[0-9]+');
Route::get('/vicedenniZavody', [CustomController::class, 'vicedenniZavody'])->name('vicedenniZavody');
Route::get('/vicedenniZavod/{zav_id}', [CustomController::class, 'vicedenniZavod'])->name('vicedenniZavod')->where('zav_id', '[0-9]+');
Route::get('/zavodLogin/{zav_id}', [CustomController::class, 'zavodLogin'])->name('zavodLogin')->where('zav_id', '[0-9]+');
Route::post('/zavodLoginPost', [CustomController::class, 'zavodLoginPost'])->name('zavodLoginPost');
Route::post('/zavodLogoutPost', [CustomController::class, 'zavodLogoutPost'])->name('zavodLogoutPost');
Route::get('/vicedenniZavodLogin/{zav_id}', [CustomController::class, 'vicedenniZavodLogin'])->name('vicedenniZavodLogin')->where('zav_id', '[0-9]+');
Route::post('/vicedenniZavodLoginPost', [CustomController::class, 'vicedenniZavodLoginPost'])->name('vicedenniZavodLoginPost');
Route::get('/user', [CustomController::class, 'user'])->name('user');
Route::post('/userDataChange', [CustomController::class, 'userDataChange'])->name('userDataChange');
