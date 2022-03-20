<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PuzzleController;
use App\Models\Puzzle;
use Illuminate\Support\Facades\Redirect;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });


Route::get('/', function () {
    return Redirect::route('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    $puzzle_count = Puzzle::count();
    $latest_puzzles = Puzzle::latest()->take(5)->get(['id', 'name', 'image', 'updated_at']);
    return Inertia::render('Dashboard', [
        'puzzles' => $latest_puzzles,
        'count' => $puzzle_count,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('puzzles', PuzzleController::class)
    ->middleware(['auth:sanctum', 'verified']);

require __DIR__ . '/auth.php';
