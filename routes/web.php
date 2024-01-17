<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpeloyeeController;

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

// Remove the default welcome route
// Route::get('/', function () {
//     return view('empeloyee', [EmpeloyeeController::class ,'employees']);
// });

// Define the main page as the employee list
Route::get('/', [EmpeloyeeController::class ,'employees'])->name('main');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Employee routes
Route::get('/employees', [EmpeloyeeController::class ,'employees'])->name('employees');
Route::get('/edit/{id}', [EmpeloyeeController::class ,'edit']);
Route::get('/delete/{id}', [EmpeloyeeController::class ,'delete']);
Route::put('/update-data/{id}', [EmpeloyeeController::class ,'update'])->name('update');
Route::get('/create', [EmpeloyeeController::class , 'create'])->name('employees.create');
Route::post('/employees', [EmpeloyeeController::class , 'store'])->name('employees.store');
Route::get('/user/{id}', [EmpeloyeeController::class ,'show'])->name('employees.show');
