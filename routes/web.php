<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
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
    return view('beranda');
});
Route::get('logout', [AuthController::class,'logout'])->name('logout');
Route::post('postlogin', [AuthController::class,'postlogin'])->name('login');


Route::get('/login', function () {
    
    if(auth()->check()){
        if(auth()->user()->role == "admin"){
            return redirect('/akun');
        }elseif(auth()->user()->role == "author"){
            return redirect('/post');
        }
    }else{
        return view('login');
    }

})->name('login');



Route::resource('akun', AkunController::class);

    Route::resource('post', PostController::class);

 