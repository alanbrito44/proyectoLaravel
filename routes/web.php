<?php

use App\Http\Controllers\Dashboard\PostController;
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

//aqui hacemos una ruta, para que tenga acceso ah todas las funciones que tiene el controlador post
Route::resource('post', PostController::class);

// Route::get('post', [PostController::class, 'index']);
// Route::get('post/create', [PostController::class, 'create']);
// Route::get('post/{post}', [PostController::class, 'show']);
// Route::get('post/{post}/edit', [PostController::class, 'edit']);

// Route::post('post', [PostController::class, 'store']);
// Route::put('post/{post}', [PostController::class, 'update']);
// Route::delete('post/{post}', [PostController::class, 'delete']);
