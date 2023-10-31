<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('user.home');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/home',[HomeController::class,'index'])->middleware('auth','verified');
Route::get('/',[HomeController::class,'home']);
Route::get('/add_new_doctor',[AdminController::class,'addview']);
// Route::get('/add_new_doctor', function () {
//     return view('user.home');
// });
Route::post('/upload_doctor',[AdminController::class,'uploadDoctor']);

Route::post('/appointment',[HomeController::class,'appointment']);

Route::get('/myappointment',[HomeController::class,'myappointment']);
Route::get('/cancel_appointment/{id}',[HomeController::class,'cancelAppoint']);

Route::get('/showappointment',[AdminController::class,'showAppointment']);
Route::get('/approve/{id}',[AdminController::class,'approve']);
Route::get('/cancel/{id}',[AdminController::class,'canceled']);
Route::get('/showDoctor',[AdminController::class,'showDoctor']);
Route::get('/delete/{id}',[AdminController::class,'deleteDoctor']);
Route::get('/updateDoctor/{id}',[AdminController::class,'updateDoctor']);
Route::post('/editDoctor/{id}',[AdminController::class,'editDoctor']);
Route::get('/emailview/{id}',[AdminController::class,'emailViews']);
Route::post('/send_notification/{id}',[AdminController::class,'sendNotification']);