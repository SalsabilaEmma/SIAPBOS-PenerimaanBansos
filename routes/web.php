<?php

use App\Http\Controllers\BantuanController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// -----------------------------------------------------------------------------------------------------------  Admin
Route::middleware('auth')->group(function () {
    Route::get('/', [Controller::class, 'index'])->name('dashboard');

    // Penerima
    Route::get('/admin-penerima', [PenerimaController::class, 'index'])->name('penerima');
    Route::get('/admin-penerima-get', [PenerimaController::class, 'indexGet'])->name('penerima.get');
    Route::get('/admin-penerima/detail/{id}', [PenerimaController::class, 'show'])->name('penerima.detail');
    Route::post('/admin-penerima/store', [PenerimaController::class, 'store'])->name('store.penerima');
    Route::get('/admin-penerima/{id}', [PenerimaController::class, 'edit'])->name('edit.penerima');
    Route::post('/admin-penerima/delete/{id}', [PenerimaController::class, 'destroy'])->name('delete.penerima');
    Route::post('/admin-penerima/update{id}', [PenerimaController::class, 'update'])->name('update.penerima');

    // Bantuan
    Route::get('/admin-bantuan', [BantuanController::class, 'index'])->name('bantuan');
    Route::get('/admin-bantuan-get', [BantuanController::class, 'indexGet'])->name('bantuan.get');
    Route::post('/admin-bantuan/store', [BantuanController::class, 'store'])->name('store.bantuan');
    Route::get('/admin-bantuan/{id}', [BantuanController::class, 'edit'])->name('edit.bantuan');
    Route::post('/admin-bantuan/delete/{id}', [BantuanController::class, 'destroy'])->name('delete.bantuan');
    Route::post('/admin-bantuan/update{id}', [BantuanController::class, 'update'])->name('update.bantuan');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
