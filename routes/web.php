<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskStatusController;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('task_statuses', [TaskStatusController::class, 'index'])->name('taskStatuses.index');
// Route::get('task_statuses/create', [TaskStatusController::class, 'create'])->name('taskStatuses.create');
// Route::post('task_statuses', [TaskStatusController::class, 'store'])->name('taskStatuses.store');
// Route::get('task_statuses/{task_status}/edit', [TaskStatusController::class, 'edit'])->name('taskStatuses.edit');
// Route::patch('task_statuses/{taskStatus}', [TaskStatusController::class, 'update'])->name('taskStatuses.update');
// Route::delete('task_statuses/{taskStatus}', [TaskStatusController::class, 'destroy'])->name('taskStatuses.destroy');

Route::resource('task_statuses', TaskStatusController::class)->except(['show']);

require __DIR__ . '/auth.php';
