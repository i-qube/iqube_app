<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\View;

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

Route::group(['prefix', 'authentication'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login_process'])->name('login');
    Route::get('/signup', function () {
        return view('auth.signup');
    });
});

Route::get('/dashboard', [WelcomeController::class, 'index']);
Route::group(['prefix' => 'level'], function() {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/{id}', [LevelController::class, 'show']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});
Route::group(['prefix' => 'user'], function() {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});
Route::group(['prefix' => 'barang'], function() {
    Route::get('/', [ItemController::class, 'index']);
    Route::post('/list', [ItemController::class, 'list']);
    Route::get('/create', [ItemController::class, 'create']);
    Route::post('/', [ItemController::class, 'store']);
    Route::get('/{id}', [ItemController::class, 'show']);
    Route::get('/{id}/edit', [ItemController::class, 'edit']);
    Route::put('/{id}', [ItemController::class, 'update']);
    Route::delete('/{id}', [ItemController::class, 'destroy']);
});
Route::group(['prefix' => 'ruangan'], function() {
    Route::get('/', [RuanganController::class, 'index']);
    Route::post('/list', [RuanganController::class, 'list']);
    Route::get('/create', [RuanganController::class, 'create']);
    Route::post('/', [RuanganController::class, 'store']);
    Route::get('/{id}', [RuanganController::class, 'show']);
    Route::get('/{id}/edit', [RuanganController::class, 'edit']);
    Route::put('/{id}', [RuanganController::class, 'update']);
    Route::delete('/{id}', [RuanganController::class, 'destroy']);
});


Route::group(['prefix' => 'user'], function () {
    Route::get('/home', [ItemController::class, 'index']);
    Route::get('/item_user', [ItemController::class, 'item']);
});
