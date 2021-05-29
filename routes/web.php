<?php

use App\Http\Controllers\TodoController;
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

// Route::get('/fa', function () {
//     return "hahaha";
// });

Route::get("/", [TodoController::class, "index"])->name("todos.index");

Route::post("/todo/create", [TodoController::class, "store"])->name("todos.create");


// Route::get("/update/{todo}", [TodoController::class, "update"])->name("todos.update");
Route::post("/todo/update", [TodoController::class, "update"])->name("todos.update");


Route::post("/todo/delete/{id}", [TodoController::class, "destroy"])->name("todos.delete");

