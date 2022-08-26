<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminAuthController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AdminProfileController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContactController;



Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
{



    // All Routes Here..
    Route::group(['prefix' => 'admin'] , function(){

        // Auth Routes ...
        Route::get('/login' , [AdminAuthController::class , 'login'])->name('admin.login')->middleware('RedirectIfAuthAdmin');
        Route::post('/doLogin' , [AdminAuthController::class , 'doLogin'])->name('admin.doLogin');
        Route::any('/logout' , [AdminAuthController::class , 'logout'])->name('admin.logout');
        // Reset Password Routes ..
        Route::get('/forgot/password' , [AdminAuthController::class , 'forgot_password'])->name('admin.forgot_password');
        Route::post('/forgot/password/post' , [AdminAuthController::class , 'forgot_password_post'])->name('admin.forgot_password_post');
        Route::get('/reset/password/{token}' , [AdminAuthController::class , 'reset_password'])->name('admin.reset_password');
        Route::post('/reset/password/post/{token}' , [AdminAuthController::class , 'reset_password_post'])->name('admin.reset_password_post');
    
        // Start Authenticated Routes .... ...
        Route::group(['middleware' => 'admin'] , function(){
            
            // Dashboard Route ..
            Route::get('/' , [AdminAuthController::class,'index'])->name('admin.index');
            
            // Profile Routes ..
            Route::get('/profile' , [AdminProfileController::class,'index'])->name('admin.profile');
            Route::post('profile/update' , [AdminProfileController::class,'update'])->name('admin.profile.update');
            
            
            // Settings Routes ..
            Route::group(['prefix' => 'settings'] , function(){
                Route::get('/' , [SettingController::class,'index'])->name('admin.settings.index');
            });

            // Admins Routes ..
            Route::group(['prefix' => 'admins'], function(){
                Route::get('/' , [AdminController::class,'index'])->name('admins.index');
                Route::get('/create' , [AdminController::class,'create'])->name('admins.create');
                Route::post('/store' , [AdminController::class,'store'])->name('admins.store');
                Route::get('/show/{admin}' , [AdminController::class,'show'])->name('admins.show');
                Route::get('/edit/{admin}' , [AdminController::class,'edit'])->name('admins.edit');
                Route::put('/update/{admin}' , [AdminController::class,'update'])->name('admins.update');
                Route::delete('/destroy/{admin}' , [AdminController::class,'destroy'])->name('admins.destroy');
                Route::get('/activation/{admin}' , [AdminController::class,'activation'])->name('admins.activation');
            });

            // Categories Routes ..
            Route::group(['prefix' => 'categories'], function(){
                Route::get('/' , [CategoryController::class,'index'])->name('categories.index');
                Route::get('/create' , [CategoryController::class,'create'])->name('categories.create');
                Route::post('/store' , [CategoryController::class,'store'])->name('categories.store');
                Route::get('/show/{category}' , [CategoryController::class,'show'])->name('categories.show');
                Route::get('/edit/{category}' , [CategoryController::class,'edit'])->name('categories.edit');
                Route::put('/update/{category}' , [CategoryController::class,'update'])->name('categories.update');
                Route::delete('/destroy/{category}' , [CategoryController::class,'destroy'])->name('categories.destroy');
                Route::get('/activation/{category}' , [CategoryController::class,'activation'])->name('categories.activation');
            });

            // Categories Routes ..
            Route::group(['prefix' => 'contacts'], function(){
                Route::get('/' , [ContactController::class,'index'])->name('contacts.index');
                Route::get('/create' , [ContactController::class,'create'])->name('contacts.create');
                Route::post('/store' , [ContactController::class,'store'])->name('contacts.store');
                Route::get('/show/{contact}' , [ContactController::class,'show'])->name('contacts.show');
                Route::get('/edit/{contact}' , [ContactController::class,'edit'])->name('contacts.edit');
                Route::put('/update/{contact}' , [ContactController::class,'update'])->name('contacts.update');
                Route::delete('/destroy/{contact}' , [ContactController::class,'destroy'])->name('contacts.destroy');
                Route::get('/activation/{contact}' , [ContactController::class,'activation'])->name('contacts.activation');
            });

            // Admins Routes ..
            Route::group(['prefix' => 'users'], function(){
                Route::get('/' , [UserController::class,'index'])->name('users.index');
                Route::get('/create' , [UserController::class,'create'])->name('users.create');
                Route::post('/store' , [UserController::class,'store'])->name('users.store');
                Route::get('/show/{user}' , [UserController::class,'show'])->name('users.show');
                Route::get('/edit/{user}' , [UserController::class,'edit'])->name('users.edit');
                Route::put('/update/{user}' , [UserController::class,'update'])->name('users.update');
                Route::delete('/destroy/{user}' , [UserController::class,'destroy'])->name('users.destroy');
                Route::get('/activation/{user}' , [UserController::class,'activation'])->name('users.activation');
            });
    
    
    
        });
        // End Authenticated Routes ....
    
    });




});


