<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckHeader;

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

/*
Route::get('/', function () {
    return view('index');
});
*/
Route::get('/{vue_capture?}', function () {
    return view('index');
})->where('/vue_capture', '[\/\w\.-]*');

Route::middleware([CheckHeader::class])->group(function () {
    Route::post('/api/save-user', [Controller::class, 'saveUser'])->name('save-user');
    Route::post('/api/update-user', [Controller::class, 'updateUser'])->name('update-user');
    Route::get('/api/get-users', [Controller::class, 'getUsers'])->name('get-users');
    Route::get('/api/get-user', [Controller::class, 'getUser'])->name('get-user');
    Route::delete('/api/delete-user', [Controller::class, 'deleteUser'])->name('delete-user');
});