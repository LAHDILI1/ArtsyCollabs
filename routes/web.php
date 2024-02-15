<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtisteController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RequestCollaborationController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Admin
// Route::get('/dashboard', [AdminController::class,'index'])->name('admin.index');
Route::get('/calendar', [AdminController::class,'calendar']);
Route::get('/forms', [AdminController::class,'forms']);
Route::get('/tables', [AdminController::class,'tables']);
Route::get('/tabs', [AdminController::class,'tabs']);
Route::get('/blank', [AdminController::class,'blank']);


//Users
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/user/{user}/update', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/search-users', [UserController::class, 'searchusers']);

//Partner
Route::get('/partners', [PartnerController::class, 'index'])->name('partners');
Route::get('/partner/create', [PartnerController::class, 'create'])->name('partner.create');
Route::post('/partner', [PartnerController::class, 'store'])->name('partner.store');
Route::get('/partner/{partner}/edit', [PartnerController::class, 'edit'])->name('partner.edit');
Route::put('/partner/{partner}/update', [PartnerController::class, 'update'])->name('partner.update');
Route::delete('/partner/{partner}/destroy', [PartnerController::class, 'destroy'])->name('partner.destroy');
Route::get('/search-partners', [PartnerController::class, 'searchpartners']);

//Project project
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
Route::get('/project/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('/project/{project}/update', [ProjectController::class, 'update'])->name('project.update');
Route::delete('/project/{project}/destroy', [ProjectController::class, 'destroy'])->name('project.destroy');
Route::get('/search-projects', [ProjectController::class, 'searchprojects']);

//collaborations RequestCollaborationController
Route::get('/collaborations', [RequestCollaborationController::class, 'index'])->name('collaborations');
// Route::post('/collaboration/{project}/{user_id}', [RequestCollaborationController::class, 'store'])->name('collaboration.store');
Route::delete('/collaboration/{collaboration}/destroy', [RequestCollaborationController::class, 'destroy'])->name('collaboration.destroy');
Route::delete('/collaboration/{collaboration}/accept', [RequestCollaborationController::class, 'accept'])->name('collaboration.accept');
// Route::post('/collaboration/{project}/{user_id}', [RequestCollaborationController::class, 'store'])->name('collaboration.store');
Route::post('/collaboration/{project}/{user_id}', [RequestCollaborationController::class, 'store'])->name('collaboration.store');



//artistes 
Route::get('/artistes', [ArtisteController::class, 'index'])->name('artistes');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
