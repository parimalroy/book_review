<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AccountController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('book.home');
Route::get('/details/{id}',[HomeController::class,'details'])->name('book.details');
Route::post('/review-store',[HomeController::class,'review_store'])->name('review.store');



Route::group(['prefix'=>'account'],function(){ 

    Route::group(['middleware'=>'guest'],function(){      
        Route::get('register/index', [AccountController::class, 'register_index'])->name('register.index');
        Route::post('register/store', [AccountController::class, 'register_store'])->name('register.store');
        Route::get('login', [AccountController::class, 'login_index'])->name('login.index');
        Route::post('login/store',[AccountController::class,'login_store'])->name('login.store');
    });
    Route::group(['middleware'=>'auth'],function(){
        Route::get('profile',[AccountController::class,'profile_index'])->name('profile.index');
        Route::post('profile/updates',[AccountController::class,'profile_update'])->name('profile.updates');
        Route::get('password',[AccountController::class,'profile_password'])->name('profile.password');
        Route::post('password',[AccountController::class,'profile_password_update'])->name('profile.password.update');
        Route::get('profile/logout',[AccountController::class,'profile_logout'])->name('profile.logout');

        Route::group(['middleware'=>'isAdmin'],function(){
            Route::get('book/index',[BookController::class,'index'])->name('book.index');
            Route::get('book/create',[BookController::class,'create'])->name('book.create');
            Route::post('book/store',[BookController::class,'store'])->name('book.store');
            Route::post('book/trash',[BookController::class,'trash'])->name('book.trash');
            Route::get('book/edit/{id}',[BookController::class,'edit'])->name('book.edit');
            Route::post('book/update/{id}',[BookController::class,'update'])->name('book.update');

            Route::get('book/review',[ReviewController::class,'index'])->name('review.index');
            Route::get('book/review/edit/{id}',[ReviewController::class,'edit'])->name('review.edit');
            Route::post('book/review/update/{id}',[ReviewController::class,'update'])->name('review.update');
            Route::post('book/review/delete',[ReviewController::class,'delete'])->name('review.delete');
        });
        



        Route::get('book/user-review',[ReviewController::class,'userReviewIndex'])->name('userReview.index');

        Route::get('book/user-review/edit/{id}',[ReviewController::class,'userReviewEdit'])->name('userReview.edit');
        Route::post('book/user-review/update/{id}',[ReviewController::class,'userReviewUpdate'])->name('userReview.update');

    });
});