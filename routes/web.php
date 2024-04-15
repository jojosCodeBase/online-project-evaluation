<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/admin/password/reset', function () {
    return view('admin.forgot-password');
})->name('forgot-password');

Route::get('/admin/students/{category}', [HomeController::class, 'allStudents'])->name('all-students');


Route::middleware(['auth', 'verified'])->group(function () {
    // routes for admin profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // routes for other dashboard operations
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/student/dashboard', [DashboardController::class, 'studentIndex'])->name('student.dashboard');

    Route::get('/faculty/dashboard', [FacultyController::class, 'index'])->name('faculty.dashboard');


    Route::get('/admin/groups-assigned', [DashboardController::class, 'manageGroups'])->name('admin.manage-groups');
    Route::get('/faculty/groups-assigned', [FacultyController::class, 'groupsAssigned'])->name('faculty.groups-assigned');

    Route::get('/admin/show-students/BCA', [DashboardController::class, 'showBCAStudents'])->name('show.BCA');
    Route::get('/admin/show-students/MCA', [DashboardController::class, 'showMCAStudents'])->name('show.MCA');

    Route::get('/faculty/show-students/BCA', [FacultyController::class, 'showBCAStudents'])->name('faculty.show.BCA');
    Route::get('/faculty/show-students/MCA', [FacultyController::class, 'showMCAStudents'])->name('faculty.show.MCA');

    Route::post('/admin/admin/add-group/', [DashboardController::class, 'addGroup'])->name('add-group');


    Route::get('/admin/add-student', [DashboardController::class, 'addStudentView'])->name('add-view');
    Route::post('/admin/franchise', [DashboardController::class, 'addFranchise'])->name('add-franchise');

    Route::get('/admin/manage-category', [DashboardController::class, 'manageCategory'])->name('manage-category');
    Route::get('/admin/category/getInfo/{id}', [DashboardController::class, 'getCategory'])->name('get-category-info');
    Route::post('/admin/manage-category/exam-category', [DashboardController::class, 'addCategory'])->name('add-exam-category');
    Route::post('/admin/manage-category/update', [DashboardController::class, 'updateCategory'])->name('update-exam-category');

    Route::post('/admin/add-student/add', [DashboardController::class, 'listStudent'])->name('list-student');
    Route::post('/admin/add-student/update', [DashboardController::class, 'updateStudent'])->name('update-student');
    Route::post('/admin/franchise/update', [DashboardController::class, 'addGroup'])->name('update-franchise');

    Route::post('/admin/add-student', [DashboardController::class, 'addStudentView'])->name('add');


    // ajax
    Route::get('/admin/fetchFranchise/', [DashboardController::class, 'getFranchises'])->name('getFranchises');
    Route::get('/admin/getInfo/{id}', [DashboardController::class, 'getInfo'])->name('getInfo');
    Route::delete('/admin/student-delete/', [DashboardController::class, 'studentDelete'])->name('student.delete');

    Route::delete('/admin/category-delete/', [DashboardController::class, 'categoryDelete'])->name('exam-category-delete');
    Route::get('/admin/getCategories/', [DashboardController::class, 'getCategories'])->name('getCategories');

    Route::get('/admin/franchise/getInfo/{id}', [DashboardController::class, 'getFranchiseInfo'])->name('get-franchise-info');
    Route::delete('/admin/franchise-delete/', [DashboardController::class, 'deleteFranchise'])->name('delete-franchise');

});


Route::post('faculty/register', [DashboardController::class, 'storeFaculty'])->name('faculty.register');
Route::post('student/register', [DashboardController::class, 'storeStudent'])->name('student.register');

require __DIR__ . '/auth.php';
