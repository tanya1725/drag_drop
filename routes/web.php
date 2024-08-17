<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\StudentController;
use App\Models\Student;

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

require __DIR__.'/auth.php';

// Route::resource('studentlogin', StudentController::class);
// Route::post("studentlogin",[StudentController::class,"show"]);
// Route::get('/studentlogin', [StudentController::class, 'index'])->name('studentlogin.index');
// Route::post('/studentlogin', [StudentController::class, 'show'])->name('studentlogin.show');


// Route::view("mainpage","mainpage");
Route::get('/getstudentlist', [StudentController::class, 'getStudentList']);
Route::get('/', [StudentController::class, 'index']);


