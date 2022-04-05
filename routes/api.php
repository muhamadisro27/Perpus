<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Book\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('/books', [BookController::class , 'index'])->name('index');
Route::get('/books/{book:slug}', [BookController::class, 'show'])->name('show');

Route::group(['middleware' => 'auth:sanctum'],function(){
   Route::prefix('dashboard')->group(function($q) {
      return 'Dashboard';
   });
   Route::post('/borrow/{book}', [BorrowBookController::class])->name('.borrow');
   Route::apiResource('/books', BookController::class)->except(['index','show']);
   Route::get('logout', [AuthController::class, 'logout']);
});