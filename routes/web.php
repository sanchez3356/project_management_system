<?php

use App\Http\Controllers\ClientsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\SearchController;

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
    if (auth()->check()) {
        return redirect()->route('home');
    } else {
        return view('auth.login');
    }
});
// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::resource('/projects', ProjectsController::class)->except('index', 'grid', 'store');
    Route::post('/projects/store', [ProjectsController::class, 'store'])->name('projects.store');
    Route::get('/projects-list', [ProjectsController::class, 'index'])->name('projects.index');
    Route::get('/projects-grid', [ProjectsController::class, 'grid'])->name('projects.grid');
    Route::resource('clients', ClientsController::class);
    Route::get('clients/{client}/edit', [ClientsController::class, 'edit'])->name('clients.edit');
    Route::resource('profiles', ProfileController::class);
    Route::resource('Inboxes', InboxController::class)->only(['index', 'store', 'destroy']);
    Route::resource('tasks', TasksController::class)->only(['index', 'destroy']);
    Route::resource('phases', PhaseController::class)->only(['store', 'destroy', 'update']);
    Route::resource('finances', FinanceController::class);
    Route::resource('accounts', AccountsController::class)->only(['edit', 'store', 'destroy']);
    Route::get('/records', [RecordsController::class, 'projects'])->name('records.project');
    Route::get('/records', [RecordsController::class, 'transactions'])->name('records.finance');
    Route::post('/tasks', [TasksController::class, 'store'])->name('tasks.store');
    // Route::get('/records', [RecordsController::class, 'getTasksData'])->name('records.tasks');
    // Route::resource('activities', ActivitiesController::class)->only(['index', 'store', 'destroy']);
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');