<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Api\PostController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/posts', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('post');
Route::get('/new-post', [PostController::class, 'create'])->middleware(['auth', 'verified'])->name('post.new');
Route::post('/new-post', [PostController::class, 'store'])->middleware(['auth', 'verified'])->name('post.store');
Route::get('/edit-post/{id}', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('post.edit');
Route::patch('/edit-post/{id}', [PostController::class, 'update'])->middleware(['auth', 'verified'])->name('post.update');
Route::delete('/delete-news/{id}', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('post.delete');

require __DIR__.'/auth.php';