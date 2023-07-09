<?php

use App\Http\Controllers\BantuanController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [Controller::class, 'index'])->name('dashboard');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::middleware(['role:admin'])->group(function () {
        // -----------------------------------------------------------------------------------------------------------  Admin
        Route::get('/dashboard-admin', [Controller::class, 'admin'])->name('dashboard.admin');
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
    // -----------------------------------------------------------------------------------------------------------  Staff
    Route::middleware(['role:staff'])->group(function () {
        Route::get('/staff', [StaffController::class, 'index'])->name('staff');
        Route::get('/staff-penerima', [StaffController::class, 'staffPenerima'])->name('staff.penerima');
        Route::get('/staff-bantuan', [StaffController::class, 'staffBantuan'])->name('staff.bantuan');
    });
    // -----------------------------------------------------------------------------------------------------------  Pimpinan
    Route::middleware(['role:pimpinan'])->group(function () {
        Route::get('/pimpinan', [PimpinanController::class, 'index'])->name('pimpinan');
        Route::get('/pimpinan-penerima', [PimpinanController::class, 'pimpinanPenerima'])->name('pimpinan.penerima');
        Route::get('/pimpinan-bantuan', [PimpinanController::class, 'pimpinanBantuan'])->name('pimpinan.bantuan');
    });
});

require __DIR__ . '/auth.php';
