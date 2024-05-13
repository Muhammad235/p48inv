<?php

use App\Mail\UserRegistrationMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BankDetailsController;

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


// Route::get('/mail-preview', function(){
//     $data = [
//         'name' => 'muhammad',
//         'username' => 'adeleke01',
//     ];

//     $mail  = new UserRegistrationMail($data);
    
//     echo $mail->render();

// })->name('mail');


Route::get('/404', function(){
    return view('errors.404');
});

Route::get('/419', function(){
    return view('errors.419');
});

Route::get('/500', function(){
    return view('errors.500');
});


Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/{user}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/bank-details', [BankDetailsController::class, 'store'])->name('bank.details.create');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

require __DIR__.'/admin.php';
