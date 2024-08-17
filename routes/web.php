<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('create');
});
Route::get('/login', function () {
    return view('login');})->name('login');
Route::get('/home',[UserController::class, 'home']);
Route::get('user',[UserController::class, 'list']);
Route::get('create',[UserController::class, 'create']);
Route::post('loginsubmit',[UserController::class, 'loginsubmit']);
Route::post('createsubmit',[UserController::class, 'createsubmit']);
Route::post('newreminder',[UserController::class, 'newreminder']);
Route::post('update_reminder',[UserController::class, 'update_reminder']);
Route::get('/setreminder', [UserController::class, 'setreminder']);
Route::get('/viewreminder', [UserController::class, 'viewreminder']);
Route::get('/modify/{reminderId}', [UserController::class, 'modify'])->name('reminder.modify');
Route::get('/modify', function () {
    return view('modify');
});
Route::get('/disable', [UserController::class, 'disable']);
Route::get('/deletereminder', [UserController::class, 'deletereminder']);
Route::post('/delete', [UserController::class, 'deletesubmit'])->name('delete');
Route::get('/confirm', function () {
    return view('confirm');
});
Route::get('/logout', function () {
    return view('logout');
});
// Route::post('/delete/{id}', 'ReminderController@delete')->name('delete');

