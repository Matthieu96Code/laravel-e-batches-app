<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CorrectionController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
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
//     return view('client/home');
// })->name('home')->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->name('admin.dashboard')->middleware(['auth', 'admin']);

Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ->except(['index', 'show'])
// ->except(['index', 'show'])

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [UserController::class, 'home'])->name('users.home');
    Route::get('/warranty', [UserController::class, 'warranty'])->name('users.warranty');
    Route::get('/fidelity', [UserController::class, 'fidelity'])->name('users.fidelity');
});

Route::resource('projects', ProjectController::class)->middleware(['auth', 'admin']);
Route::resource('users', UserController::class)->middleware(['auth', 'admin']);
Route::put('/users/{user}/edit', [UserController::class, 'changePassword'])->name('users.changePassword')->middleware(['auth', 'admin']);;

Route::resource('guests', GuestController::class);
Route::post('/users/create/{guest}', [GuestController::class, 'moveToUser'])->name('guests.moveToUser')->middleware(['auth', 'admin']);




Route::resource('batches', BatchController::class)->middleware(['auth']);
Route::resource('batches.corrections', CorrectionController::class)->shallow()->middleware(['auth']);

