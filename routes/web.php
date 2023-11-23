<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\cekController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\instalController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\penggunaControlle;
use App\Http\Controllers\PrintPdfController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\sertifikatController;
use App\Http\Controllers\SessionCotroller;
use App\Models\sertifikat;
use Illuminate\Auth\Events\Login;
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

Route::get('/sesi', [SessionCotroller::class,'index']);
Route::post('/sesi/login',[SessionCotroller::class,'login']);
Route::get('/sesi/logout',[SessionCotroller::class, 'logout']);
Route::get('/sesi/register', [SessionCotroller::class,'register']);
Route::post('/sesi/create',[SessionCotroller::class,'createRegister']);
//---------------------------------------------------------------
Route::get('/dashboard', function(){
    return view('dashboard-admin');
});
Route::get('/sertifikat/pdf',[instalController::class,'downloadImage']);
Route::resource('sertifikat', sertifikatController::class);
Route::get('/table',[SearchController::class, 'table']);
Route::get('/table-cetak',[SearchController::class, 'table2']);
Route::get('/cek', [SearchController::class, 'search']);

Route::resource('pengguna', penggunaControlle::class);
Route::resource('admin', adminController::class);
Route::get('download/{image}', 'instalController@downloadImage')->name('downloadImage');



Route::get('/home', function(){
    return view('home');
});
//admin----------------------------------------------------------

Route::get('/dashboard-user', function(){
    return view('dashboard');
});
Route::get('download', 'DownloadController@download');




Route::get('/login', [LoginUserController::class,'index']);
Route::post('/login/login',[LoginUserController::class,'login']);
Route::get('/login/logout',[LoginUserController::class, 'logout']);




