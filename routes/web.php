<?php

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

Auth::routes([
    'register' => false
]);

//hanya untuk role admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function(){
    Route::get('/', function(){
        return 'halaman admin';
 });
   Route::get('profile', function(){
       return 'halaman profile admin';
   });
});

//hanya untuk role pengguna
Route::group(['prefix' => 'pengguna', 'middleware' => ['auth', 'role:pengguna']], function(){
    Route::get('/', function(){
        return 'halaman pengguna';
    });
    Route::get('profile', function(){
        return 'halaman profile pengguna';
    });
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
