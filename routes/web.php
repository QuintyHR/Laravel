<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\CharacterOldController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProfileController;
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

//Home
Route::get('/', function () {
    return view('welcome');
});

//Main pages
Route::get('/about', [AboutController::class, 'index']);
Route::get('/characters', [CharacterController::class, 'index']);
Route::get('/detail/{id}', [DetailController::class, 'index']);

//Accounts
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/editProfile/{id}', [ProfileController::class, 'edit'])->middleware('auth');
Route::put('/updateProfile/{id}', [ProfileController::class, 'update'])->middleware('auth');

//Admin
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');
Route::get('/changeActive', [AdminController::class, 'changeActive'])->middleware('auth');

//Character editing
Route::resource('characters', CharacterController::class);
Route::get('/edit/{id}', [CharacterController::class, 'edit'])->middleware('auth');
Route::put('/update/{id}', [CharacterController::class, 'update'])->middleware('auth');
Route::get('/delete/{id}', [CharacterController::class, 'delete'])->middleware('auth');
Route::post('/favourite', [CharacterController::class, 'favouriteUnfavourite'])->middleware('auth');
Route::post('/unFavourite', [CharacterController::class, 'favouriteUnfavourite'])->middleware('auth');


//Laravel login
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
