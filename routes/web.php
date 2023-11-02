<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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

Route::get('layoute/welcom', function () {
    return view('welcome');
});


Route::get('/test', TestController::class);

Route::get('/', function(){
    return view('layouts/mainpage');
}) -> name('mainpage');

Route::get('registration/create', [RegistrationController::class, 'create']) -> name('reg.create');
Route::post('registration', [RegistrationController::class, 'store']) -> name('reg.store');
Route::get('registration/records', [RegistrationController::class, 'index']) -> name('reg.index');
Route::get('registration/{record}', [RegistrationController::class, 'show']) -> name('reg.show');
Route::get('registration/{record}/edit', [RegistrationController::class, 'edit']) -> name('reg.edit');
Route::delete('registration/{record}', [RegistrationController::class, 'delete']) -> name('reg.delete');