<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\usercontroller;

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

Route::get('/',[usercontroller::class,'index'])->name('index');
Route::get('/view_user',[usercontroller::class,'view_user'])->name('view_user');
Route::get('{id}/edit_user',[usercontroller::class,'edit_user'])->name('edit_user');
Route::put('{id}/update_user',[usercontroller::class,'update_user'])->name('update_user');
Route::get('{id}/user_details',[usercontroller::class,'user_details'])->name('user_details');
// Route::get('{id}/delete',[usercontroller::class,'delete'])->name('delete');
Route::delete('{id}/delete',[usercontroller::class,'delete'])->name('delete');
Route::post('/store',[usercontroller::class,'store'])->name('store');
Route::get('/login',[usercontroller::class,'login'])->name('login');
Route::post('/loginp',[usercontroller::class,'loginp'])->name('loginp');

// Route::get('/app',[usercontroller::class,'app'])->name('app');
Route::get('/study',[usercontroller::class,'study'])->name('study');
Route::get('/logout',[usercontroller::class,'logout'])->name('logout');
Route::get('{id}/header',[usercontroller::class,'header'])->name('header');
 