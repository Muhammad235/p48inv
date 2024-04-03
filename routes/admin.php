<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;


//Admin Routes
Route::group(['prefix' => 'adm', 'as' => 'admin.' ], function (){

    Route::get('/', [AdminController::class, 'index'])
                ->name('index');


    Route::post('login', [AdminController::class, 'login'])
                ->name('login');

    Route::get('dashboard', [AdminController::class,'dashboard'])    
                // ->middleware(['auth', 'verified'])
                ->name('dashboard');

    Route::get('/profile', [AdminController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [AdminController::class, 'update'])->name('profile.update');

    Route::post('password', [AdminController::class, 'update'])->name('password.update');
    
});

