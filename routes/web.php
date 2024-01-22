<?php

use App\Http\Controllers\Auth\Registercontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\TodoController;
use GuzzleHttp\Middleware;

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

/**
 * Below the code for login and regsiter 
 * Routes
 * @author meganathan
 * 
 */
Route::post('register', [Registercontroller::class, 'store'])->name('register')->middleware('guest');
Route::view('register', 'Auth.register')->middleware('guest');
Route::view('login', 'Auth.login')->name('login')->Middleware('guest'); // Guest vanthu home page ku pogama pathukom
Route::post('login', [LoginController::class, 'login']);
Route::view('home', 'home')->middleware('auth'); // This auth helper function check the user // and logout ana aprm home eh access pana kudathu athuku auth use panurom 
Route::get('logout', [LoginController::class, 'logout']);


// Below the code for TODO routes
Route::middleware('auth')->group(function () {
    Route::get('/tasks', [TodoController::class, 'index'])->name('tasks.index');
    Route::post('/tasks',[TodoController::class,'store'])->name('task.store');
    Route::patch('/tasks/{task}', [TodoController::class,'update'])->name('tasks.complete');

});
