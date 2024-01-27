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
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\IntrestsController;
use App\Http\Controllers\SkillsController;

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
    Route::resource('profiles', ProfileController::class)->only(['index', 'update', 'create']);
    Route::resource('Inboxes', InboxController::class);
    Route::resource('Reviews', ReviewsController::class);
    Route::resource('Portfolio', PortfolioController::class);
    Route::resource('language', LanguageController::class)->only(['store', 'destroy', 'update', 'edit']);
    Route::resource('interests', IntrestsController::class)->only(['store', 'destroy', 'update', 'edit']);
    Route::resource('skill', SkillsController::class)->only(['store', 'destroy', 'update', 'edit']);
    Route::resource('Blogs', PortfolioController::class);
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::delete('/gallery/{image}', [GalleryController::class, 'delete'])->name('gallery.delete');
    Route::delete('/gallery/delete-multiple', [GalleryController::class, 'deleteMultiple'])->name('gallery.deleteMultiple');
    Route::resource('notifications', NotificationsController::class);
    Route::resource('Resume', ResumeController::class);
    Route::get('Inboxes/{id}/forward', [InboxController::class, 'forward'])->name('Inboxes.forward');
    Route::resource('phases', PhaseController::class)->only(['store', 'destroy', 'update']);
    Route::resource('education', EducationController::class)->only(['store', 'destroy', 'update']);
    Route::resource('career', CareerController::class)->only(['store', 'destroy', 'update', 'edit']);
    Route::resource('reference', ReferenceController::class)->only(['store', 'destroy', 'update', 'edit']);
    Route::resource('finances', FinanceController::class);
    Route::resource('accounts', AccountsController::class)->only(['edit', 'store', 'destroy']);
    Route::get('/records/project', [RecordsController::class, 'projects'])->name('records.project');
    Route::get('/records/finance', [RecordsController::class, 'transactions'])->name('records.finance');
    Route::get('/records/messages', [RecordsController::class, 'messages'])->name('records.messages');
    Route::get('/records/gallery', [RecordsController::class, 'gallery'])->name('records.gallery');
    Route::resource('/tasks', TasksController::class);
    Route::resource('/newsletter', NewsletterController::class)->only(['index', 'update', 'delete']);
    // Route::get('/records', [RecordsController::class, 'getTasksData'])->name('records.tasks');
    // Route::resource('activities', ActivitiesController::class)->only(['index', 'store', 'destroy']);
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');