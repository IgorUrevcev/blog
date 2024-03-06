<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CatController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [MainController::class, 'index']) ->name('admin.index');
    Route::resource('/categories', CategoryController::class);
    Route::get('/cat', [CatController::class, 'index']) ->name('admin.cat');
});

// Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    
// });
