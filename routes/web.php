<?php

use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Fronsite\AppointmentController;
use App\Http\Controllers\Fronsite\LandingController;
use App\Http\Controllers\Fronsite\PaymentController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// kenapa ini di luar? karena dia gak perlu login/middleware
Route::resource('/', LandingController::class);

// trhis route for frontend
Route::group(['middleware'=> ['auth:sanctum', 'verified']], function (){

    // appointmen page
    Route::resource('appointment', AppointmentController::class);

    // payment page

    Route::resource('payment', PaymentController::class);

});

// this is middleware group (jadi untuk akses page ini harus login dulu)
Route::group(['prefix'=> 'backsite', 'as' => 'backersite.', 'middleware'=> ['auth:sanctum', 'verified']], function (){
    
    Route::resource('dashboard', DashboardController::class);
    
});
