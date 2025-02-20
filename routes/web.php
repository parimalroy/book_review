<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return view('welcome');
});



Route::group(['prefix'=>'account'],function(){

    Route::group(['middleware'=>'guest'],function(){      
        Route::get('register/index', [AccountController::class, 'register_index'])->name('register.index');
        Route::post('register/store', [AccountController::class, 'register_store'])->name('register.store');
        Route::get('login/index', [AccountController::class, 'login_index'])->name('login.index');
        Route::post('login/store',[AccountController::class,'login_store'])->name('login.store');
    });
    Route::group(['middleware'=>'auth'],function(){
        Route::get('profile',[AccountController::class,'profile_index'])->name('profile.index');
        Route::post('profile/updates',[AccountController::class,'profile_update'])->name('profile.updates');
        Route::get('profile/logout',[AccountController::class,'profile_logout'])->name('profile.logout');

        Route::get('book/index',[BookController::class,'index'])->name('book.index');

    });
});