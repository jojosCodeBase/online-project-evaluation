<?php

use App\Mail\TestMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\Auth\RegisteredUserController;

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
Route::middleware(['auth'])->group(function () {
    // Admin routes
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        // Admin profile management
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Admin dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/evaluations', [DashboardController::class, 'evaluations'])->name('evaluations');

        // Admin groups management
        Route::get('/groups-assigned', [DashboardController::class, 'manageGroups'])->name('admin.manage-groups');

        // Other admin-specific routes
        // Route::get('/presentations', [DashboardController::class, 'presentations'])->name('admin.presentation');

        Route::get('/manage-project', [ProjectController::class, 'index'])->name('admin.manage-project');
        Route::post('/manage-project/add', [ProjectController::class, 'store'])->name('admin.project.store');
        Route::post('/manage-project/update', [ProjectController::class, 'update'])->name('admin.project.update');
        Route::delete('/manage-project/delete', [ProjectController::class, 'destroy'])->name('admin.project.delete');

        Route::get('/manage-presentation', [PresentationController::class, 'index'])->name('admin.manage-presentation');
        Route::post('/manage-presentation/add', [PresentationController::class, 'addPresentation'])->name('admin.presentation.store');
        Route::put('/manage-presentation/update', [PresentationController::class, 'updatePresentation'])->name('admin.presentation.update');

        Route::post('add-group/', [DashboardController::class, 'addGroup'])->name('add-group');
        Route::post('update-group/', [DashboardController::class, 'updateGroup'])->name('update-group');
        Route::delete('delete-group/', [DashboardController::class, 'deleteGroup'])->name('delete-group');

        // Ajax route
        Route::get('/groupInfo/{id}', [DashboardController::class, 'getGroupInfo']);
        Route::get('/projects/{id}', [ProjectController::class, 'getProject']);
    });

    // Faculty routes
    Route::middleware(['faculty'])->prefix('faculty')->group(function () {
        // Admin profile management

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        // Faculty dashboard
        Route::get('/dashboard', [FacultyController::class, 'index'])->name('faculty.dashboard');

        // Faculty groups assigned
        Route::get('/groups-assigned', [FacultyController::class, 'groupsAssigned'])->name('faculty.groups-assigned');

        // Faculty show students
        Route::get('/evaluate/minor', [FacultyController::class, 'evaluateMinor'])->name('faculty.evaluate-minor');
        Route::get('/evaluate/major', [FacultyController::class, 'evaluateMajor'])->name('faculty.evaluate-major');

        Route::post('/evaluate/major', [FacultyController::class, 'evaluateMajorMarks'])->name('student.evaluate');

        Route::get('/get-group-members/{groupId}', [DashboardController::class, 'getGroupMembers']);
    });

    // Student routes
    Route::middleware(['student'])->prefix('student')->group(function () {

        Route::get('/profile', [ProfileController::class, 'student_edit'])->name('student-profile.edit');
        Route::patch('/profile', [ProfileController::class, 'student_update'])->name('student-profile.update');
        Route::delete('/profile', [ProfileController::class, 'student_destroy'])->name('student-profile.destroy');
        // Student dashboard
        Route::get('/dashboard', [StudentController::class, 'index'])->name('student.dashboard');

        // Student specific routes
        Route::get('/dashboard/upload', [StudentController::class, 'upload'])->name('student.upload');
        Route::get('/dashboard/chat', [StudentController::class, 'chat'])->name('student.chat');

        Route::post('/upload-document', [StudentController::class, 'uploadDocument'])->name('upload.document');

    });
});

// Routes accessible without authentication
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/mail', function(){
//     Mail::to('kunsangmoktan11@gmail.com')->send(new TestMail());
// });
Route::get('/mail-view', function(){
    $link = 'https://bca.welcomehomestay.in/';
    return view('emails.view-test', compact('link'));
});

// Forgot password route
Route::get('/admin/password/reset', function () {
    return view('admin.forgot-password');
})->name('forgot-password');

Route::get('/teacher-portal',function(){
    return view('faculty.teacherportal');
})->name('teacher-portal');


require __DIR__ . '/auth.php';
