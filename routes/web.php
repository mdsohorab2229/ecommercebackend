<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth','role:user'])->name('dashboard');

// Route::get('/userprofile',[DashboardController::class, 'userprofile']);

// Route::controller(DashboardController::class)->group(function(){
//     Route::get('/users','Index');       

//     })->middleware(['auth']);
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/users','Index');       

        });
});


// Route::middleware(['auth','admin'])->group(function(){

// });
// Route::controller(OrderController::class)->group(function () {
//     Route::get('/orders/{id}', 'show');
//     Route::post('/orders', 'store');
// });
require __DIR__.'/auth.php';
