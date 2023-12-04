<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tecbus\AdminController;
use App\Http\Controllers\Tecbus\DriverController;
use App\Http\Controllers\Tecbus\ProfessorController;
use App\Http\Controllers\Tecbus\StudentController;

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

Route::middleware(['auth', 'check_user_type'])->group(function () {
    // Rutas para todos los usuarios autenticados
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas específicas para cada tipo de usuario
    // Route::middleware(['check_user_type:Estudiante'])->group(function () {
    //     Route::get('/estudiante/dashboard', [StudentController::class, 'StudentDashboard'])->name('estudiante.dashboard');
    // });

    // Route::middleware(['check_user_type:Administrador'])->group(function () {
    //     Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    // });

    // Route::middleware(['check_user_type:Profesor'])->group(function () {
    //     Route::get('/profesor/dashboard', [ProfessorController::class, 'ProfessorDashboard'])->name('profesor.dashboard');
    // });
});

Route::middleware(['auth', 'check_user_type:Estudiante'])->group(function () {
    Route::get('/estudiante/dashboard', [StudentController::class, 'StudentDashboard'])->name('estudiante.dashboard');
});

Route::middleware(['auth', 'check_user_type:Administrador'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'check_user_type:Profesor'])->group(function () {
    Route::get('/profesor/dashboard', [ProfessorController::class, 'ProfessorDashboard'])->name('profesor.dashboard');
});





// Route::middleware(['auth', 'check_user_type:Administrador'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
// });

// Route::middleware(['auth', 'check_user_type:Estudiante'])->group(function () {
//     Route::get('/estudiante/dashboard', [StudentController::class, 'StudentDashboard'])->name('estudiante.dashboard');
// });

// Route::middleware(['auth', 'check_user_type:Conductor'])->group(function () {
//     Route::get('/estudiante/dashboard', [DriverController::class, 'DriverDashboard'])->name('conductor.dashboard');
// });


// Route::get('/profesor/dashboard', [ProfessorController::class, 'ProfessorDashboard'])->name('profesor.dashboard');
// Route::get('/estudiante/dashboard', [StudentController::class, 'StudentDashboard'])->name('estudiante.dashboard');


require __DIR__ . '/auth.php';
