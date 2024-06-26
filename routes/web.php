<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PeminjamanBarangController;
use App\Http\Controllers\PeminjamanRuanganController;
use App\Http\Controllers\ReportBarangController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\UserBorrowController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserItemController;
use App\Http\Controllers\UserRoomController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\View;

Route::group(['prefix' => 'item_user'], function () {
    Route::get('/', [UserItemController::class, 'index']);
    Route::post('/load', [UserItemController::class, 'load']);
    Route::get('/item_borrow', [UserItemController::class, 'form']);
    Route::post('/', [UserItemController::class, 'store']);
});
Route::group(['prefix' => 'room_user'], function () {
    Route::get('/', [UserRoomController::class, 'index']);
    Route::get('/load', [UserRoomController::class, 'load']);
    Route::get('/room_borrow', [UserRoomController::class, 'form']);
    Route::post('/', [UserRoomController::class, 'store']);
});

Route::get('/peminjaman', [UserBorrowController::class, 'index']);

Route::group(['prefix' => 'login'], function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login_process'])->name('login');
});
Route::post('/keluar', [LogoutController::class, 'index'])->name('logout');

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/dashboard_user', function () {
        return view('user.dashboard');
    });
});

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', [WelcomeController::class, 'index'])->name('admin.dashboard');
});

Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/{id}', [LevelController::class, 'show']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});
Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [ItemController::class, 'index']);
    Route::post('/list', [ItemController::class, 'list']);
    Route::get('/create', [ItemController::class, 'create']);
    Route::post('/', [ItemController::class, 'store']);
    Route::get('/{id}', [ItemController::class, 'show']);
    Route::get('/{id}/edit', [ItemController::class, 'edit']);
    Route::put('/{id}', [ItemController::class, 'update']);
    Route::delete('/{id}', [ItemController::class, 'destroy']);
});
Route::group(['prefix' => 'ruangan'], function () {
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

Route::group(['prefix' => 'pinjam'], function () {
    Route::get('/', [PeminjamanBarangController::class, 'index']);
    Route::post('/list/barang', [PeminjamanBarangController::class, 'list']);
    Route::post('/list/ruangan', [PeminjamanRuanganController::class, 'list']);
    Route::post('/change-status', [PeminjamanRuanganController::class, 'changeStatus']);
});

Route::get('/export', [ReportBarangController::class, 'export']);

Route::group(['prefix' => 'riwayat'], function () {
    Route::get('/', [RiwayatController::class, 'index']);
    Route::get('/listBarang', [RiwayatController::class, 'listBarang']);
    Route::get('/listRuangan', [RiwayatController::class, 'listRuangan']);
});

Route::post('pinjam/change-status', [PeminjamanRuanganController::class, 'changeStatus'])->name('pinjam.changeStatus');
