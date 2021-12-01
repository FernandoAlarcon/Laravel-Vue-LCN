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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/index', function (){ return view('index'); })->name('index');
Route::get('/entrar', function (){ return view('loguin'); })->name('entrar');
Route::get('/registro', function (){ return view('register'); })->name('registro');
Route::get('/about_us', function (){ return view('about_us'); })->name('aboout_us');

Route::get('/{any?}', function (){
    return view('welcome');
})->where('any', '^(?!api\/)[\/\w\.-]*'); 
 
//Route::any('{all}', function () { return view('layouts.app'); })->where(['all' => '.*']);