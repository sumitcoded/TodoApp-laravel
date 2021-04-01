<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/upload',[UserController::class,'upload']);
Route::middleware('auth')->group(function (){
    Route::get('/todos',[TodoController::class,'index']);
    Route::get('/todos/create',[TodoController::class,'create']);
    Route::get('/todos/edit/{id}',[TodoController::class,'edit']);
    Route::post('/todos/create',[TodoController::class,'store']);
    Route::patch('/todos/update/{id}',[TodoController::class,'update'])->name('todo.update');
    Route::put('/todos/complete/{id}',[TodoController::class,'complete'])->name('todo.complete');
    Route::put('/todos/incomplete/{id}',[TodoController::class,'incomplete'])->name('todo.incomplete');
    Route::put('/todos/delete/{todo}',[TodoController::class,'delete'])->name('todo.delete');
    Route::get('/todos/show/{id}',[TodoController::class,'show'])->name('todo.show');
});

