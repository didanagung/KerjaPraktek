<?php

use App\Http\Middleware\CekLogin;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::group(['middleware' => ['auth', 'ceklogin:admin']], function () {
    Route::get('/jenis-surat', 'AdminController@jsurat');
    Route::get('/buat', 'AdminController@create');
    Route::get('/verifikasi', 'AdminController@halamanverifikasi');
    Route::get('/verifikasi/{suratmhs}', 'AdminController@verifikasi');
    Route::patch('/verifikasi/{suratmhs}', 'AdminController@update');
    Route::get('/registrasi', 'AdminController@registrasi');
    Route::get('/arsip', 'AdminController@arsip');
    Route::get('/jenis-surat/{slug}', 'AdminController@show');
    Route::delete('/jenis-surat/{id}', 'AdminController@destroy');
    Route::get('/downloadarsp/{file}', 'AdminController@download');
    Route::post('/surat', 'AdminController@store');
});

Route::group(['middleware' => ['auth', 'ceklogin:wk']], function () {
    Route::get('/tanda-tangan', 'WKetuaController@show');
    Route::get('/uploadsrt', 'WKetuaController@upload');
    Route::get('/uploadsrt/{suratmhs}', 'WKetuaController@uploadsrt');
    Route::patch('/uploadsrt/{suratmhs}', 'WKetuaController@update');
    Route::get('/downloadttd/{file}', 'WKetuaController@download');
});

Route::get('/surat/{slug}', 'UserController@show');
// Route::resource('surat', 'UserController');
Route::get('/surat', 'UserController@index');
Route::get('/upload', 'UserController@upload');
Route::get('/download/{file}', 'UserController@download');
Route::post('/upload', 'UserController@storesrt');
Route::get('/download-surat/{id}', 'UserController@downloadsrt');
Route::get('/unduh/{file}', 'UserController@unduh');
// Route::get('/download-surat/{id}/detail', 'UserController@downloadsrtdtl');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
