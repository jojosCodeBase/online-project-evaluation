<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
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

// Routes accessible to all authenticated users
Route::middleware(['auth', 'verified'])->group(function () {
    // Admin routes
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        // Admin profile management
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Admin dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Admin groups management
        Route::get('/groups-assigned', [DashboardController::class, 'manageGroups'])->name('admin.manage-groups');
        Route::get('/evaluate/minor', [DashboardController::class, 'evaluateMinor'])->name('show.BCA');
        Route::get('/evaluate/major', [DashboardController::class, 'evaluateMajor'])->name('show.MCA');

        // Other admin-specific routes
        Route::get('/presentations', [DashboardController::class, 'presentations'])->name('admin.presentation');
        Route::get('/manage-project', [DashboardController::class, 'manageProject'])->name('admin.manage-project');
        Route::get('/manage-presentation', [DashboardController::class, 'managePresentation'])->name('admin.manage-presentation');

        Route::post('add-group/', [DashboardController::class, 'addGroup'])->name('add-group');
        Route::post('update-group/', [DashboardController::class, 'updateGroup'])->name('update-group');

        // Ajax route
        Route::get('/groupInfo/{id}', [DashboardController::class, 'getGroupInfo']);
    });

    // Faculty routes
    Route::middleware(['faculty'])->prefix('faculty')->group(function () {
        // Faculty dashboard
        Route::get('/dashboard', [FacultyController::class, 'index'])->name('faculty.dashboard');

        // Faculty groups assigned
        Route::get('/groups-assigned', [FacultyController::class, 'groupsAssigned'])->name('faculty.groups-assigned');

        // Faculty show students
        Route::get('/show-students/BCA', [FacultyController::class, 'showBCAStudents'])->name('faculty.show.BCA');
        Route::get('/show-students/MCA', [FacultyController::class, 'showMCAStudents'])->name('faculty.show.MCA');
    });

    // Student routes
    Route::middleware(['student'])->prefix('student')->group(function () {
        // Student dashboard
        Route::get('/dashboard', [StudentController::class, 'index'])->name('student.dashboard');

        // Student specific routes
        Route::get('/dashboard/upload', [StudentController::class, 'upload'])->name('student.upload');
        Route::get('/dashboard/chat', [StudentController::class, 'chat'])->name('student.chat');
    });
});

// Routes accessible without authentication
Route::get('/', [HomeController::class, 'index'])->name('home');

// Forgot password route
Route::get('/admin/password/reset', function () {
    return view('admin.forgot-password');
})->name('forgot-password');

// Registration routes
Route::post('faculty/register', [DashboardController::class, 'storeFaculty'])->name('faculty.register');
Route::post('student/register', [DashboardController::class, 'storeStudent'])->name('student.register');

require __DIR__ . '/auth.php';
