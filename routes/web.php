<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

use App\Http\Controllers\NavbarController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CalendarController;
use Illuminate\Support\Facades\Http;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

Route::get('/message-test', function () {

});

//authentication
Route::get('homepage', [CustomAuthController::class , 'dashboard']);

Route::get('login', [CustomAuthController::class , 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class , 'customLogin'])->name('login.custom');

Route::get('registration', [CustomAuthController::class , 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class , 'customRegistration'])->name('register.custom');

Route::get('signout', [CustomAuthController::class , 'signOut'])->name('signout');
//authentication

Route::get('/', [PagesController::class , 'homepage'])->name('homepage');
Route::get('/template', [PagesController::class , 'index'])->name('template');

Route::get('/guest_home', [PagesController::class , 'guest_index'])->name('guest.home');
// Route::get('/calendar', [PagesController::class , 'guest_index'])->name('guest.calendar');
// Route::get('/tasks', [PagesController::class , 'guest_index'])->name('guest.tasks');




//navbar
// Route::get('/tasks', [NavbarController::class , 'tasks'])->name('tasks.index');

//Budget*****************************************************************************
//handle the form 
Route::post('/budget', [BudgetController::class , 'store'])->name('budget.store');

//print budget
Route::get('/budget', [BudgetController::class , 'index'])->name('budget.index');


// Route::delete('/budget', [BudgetController::class , 'destroy'])->name('budget.destroy');


Route::get('/budget/delete/{id}', [BudgetController::class , 'destroy'])->name('budget.destroy');

//Budget***************************************************************************




// calendar/schedule
// read the schedule
Route::get('/schedule', [CalendarController::class , 'index'])->name('calendar.index');


//handle the form 
Route::post('/schedule', [CalendarController::class , 'store'])->name('calendar.store');



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// Route::group(['middleware' => 'auth'], function () {
//   Route::get('/tasks', [TaskController::class , 'index'])->name('tasks.index');
//   Route::post('/tasks', [TaskController::class , 'store'])->name('tasks.store');
//   Route::put('/tasks/sync', [TaskController::class , 'sync'])->name('tasks.sync');
//   Route::put('/tasks/{task}', [TaskController::class , 'update'])->name('tasks.update');
// });

// Route::group(['middleware' => 'auth'], function () {
//   Route::post('/statuses', [TaskController::class , 'store'])->name('statuses.store');
//   Route::put('/statuses', [TaskController::class , 'update'])->name('statuses.update');
// });

Route::get('/tasks', [TaskController::class , 'index'])->name('tasks.index');
Route::post('/tasks', [TaskController::class , 'store'])->name('tasks.store');
Route::put('/tasks/sync', [TaskController::class , 'sync'])->name('tasks.sync');
Route::put('/tasks/{task}', [TaskController::class , 'update'])->name('tasks.update');

Route::post('/statuses', [TaskController::class , 'store'])->name('statuses.store');
Route::put('/statuses', [TaskController::class , 'update'])->name('statuses.update');

Route::get('/budgets', [BudgetController::class , 'getBudgets'])->name('api.budgets.index');
// 








// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&



Route::get('/original-budget', [BudgetController::class , 'index_old'])->name('budget-old.index');

Route::post('/original-budget', [BudgetController::class , 'store2'])->name('budget-old.store');
