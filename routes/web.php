<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});


// Static Route
Route::get('/blogs', function(){
    return "Hello!, This is Blog Page";
});

// Dynamic Route
Route::get('/blogs/{id}', function($id){
    return "Hello!, This is Blog Detial - $id";
});

// Naming Route
// Route::get('/dashboard', function(){
//     return "Welcome from TPP Program";
// })->name('dashboard.tpp');

// Route::get('/welcome-tpp', function(){
//     return redirect()->route('dashboard.tpp');
// });

// Group Route
Route::prefix('/dashboard')->group(function(){
    Route::get('/admin', function(){
        return "This is admin dashboard!";
    });

    Route::get('/user', function(){
        return "This is user dashboard";
    })->name('dashboard.user');

    Route::get('/student', function(){
        return redirect()->route('dashboard.user');
    });
});

// Route::get('/categories', function(){
//     return view('categories.index');
// });
Route::get('/categories', [CategoryController::class, 'index']);
