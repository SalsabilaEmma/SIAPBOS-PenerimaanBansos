<?php

use App\Http\Controllers\BantuanController;
use App\Http\Controllers\Controller;
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
    Route::get('/dashboard', [Controller::class, 'index'])->name('dashboard');

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
