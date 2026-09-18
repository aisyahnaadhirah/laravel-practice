<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HelloController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [HelloController::class, 'index']);

//Student route boleh guna dua cara, yang comment banyak ni atau yang satu line
/*Route::get('/students', [StudentController::class, 'index']); //nak read data
Route::get('/students/create', [StudentController::class, 'create']); //nak add new data
Route::post('/students', [StudentController::class, 'store']); //nak simpan data baru
Route::get('/students/{id}/edit', [StudentController::class, 'edit']);
Route::put('/students/{id}', [StudentController::class, 'update']);
Route::delete('/students/{id}', [StudentController::class, 'destroy']);*/

Route::resource('students', StudentController::class);