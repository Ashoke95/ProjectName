<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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




Route::get('/contact', [ App\Http\Controllers\ContactController::class, 'index' ])->name('index');
Route::get('/contact/create', [ App\Http\Controllers\ContactController::class, 'create' ])->name('create');
Route::post('/contact', [ App\Http\Controllers\ContactController::class, 'store' ])->name('store');
 Route::get('/editstudent/{id}', [ App\Http\Controllers\ContactController::class, 'editstudent' ])->name('editstudent');
 Route::post('/updatestudent', [ App\Http\Controllers\ContactController::class, 'updatestudent' ])->name('updatestudent');


Route::get('/deletestudent/{id}', [App\Http\Controllers\ContactController::class, 'deletestudent'])->name('deletestudent');
Route::get('/contact-us', [ContactController::class, 'index1']);
Route::post('/contact-us', [ContactController::class, 'save'])->name('save');