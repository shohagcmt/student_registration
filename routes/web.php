<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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
    return view('backend.layouts.master');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/student/class/view',[StudentController::class,'view'])->name('student.class.view');
Route::get('/student/class/add',[StudentController::class,'add'])->name('student.class.add');
Route::post('/student/class/store',[StudentController::class,'store'])->name('student.class.store');
Route::get('/student/class/edit/{id}',[StudentController::class,'edit'])->name('student.class.edit');
Route::post('/student/class/update/{id}',[StudentController::class,'update'])->name('student.class.update');
Route::get('/student/class/delete/{id}',[StudentController::class,'delete'])->name('student.class.delete');
