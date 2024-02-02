<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;
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
//     return view('mainPage');
// });




// user

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [UserController::class, 'login'])->name('loginPage');
    Route::post('/login', [UserController::class, 'loginUser'])->name('loginUser');
    Route::get('/register', [UserController::class, 'register'])->name('registerPage');
    Route::post('/register', [UserController::class, 'store'])->name('registerUser');
   
});

Route::get('/logout',  [UserController::class, 'logout'])->name('logout');


// admin

Route::middleware(['admin'])->group(function () {
    // Admin-only routes go here
    Route::get('/admin', [AdminController::class, 'index'])->name('adminPage');
    Route::get('/admin/categories', [AdminController::class, 'categories'])->name('categories');
    Route::post('/admin/categories', [AdminController::class, 'addCategory'])->name('addCategory');
    Route::delete('/admin/categories/{id}', [AdminController::class, 'deleteCategory'])->name('deleteCategory');
    Route::get('/admin/categories/detail/{id}', [AdminController::class, 'detaiCategory'])->name('detaiCategory');
    
    Route::get('/admin/detail-user/{detai_user}', [AdminController::class, 'detaiUser'])->name('detaiUser');
  
});



Route::middleware(['user'])->group(function () {
    Route::resource('links', LinkController::class);
});

Route::get('/{short_link}', [LinkController::class, 'redirectLink'])->name('linkRedirect');