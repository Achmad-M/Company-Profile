<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\DetailKelasController;

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

Route::get('/', function () {
    return redirect('/index');
});
Route::get('/index#', function () {
    return redirect('/index');
});

Route::get('/index', function () {
    return view('index');
})->name('index');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/classes', function () {
    return view('classes');
})->name('classes');

Route::get('/facility', function () {
    return view('facility');
})->name('facility');

Route::get('/team', function () {
    return view('team');
})->name('team');

Route::get('/call-to-action', function () {
    return view('call-to-action');
})->name('call-to-action');

Route::get('/appointment', function () {
    return view('appointment');
})->name('appointment');

Route::get('/testimonial', function () {
    return view('testimonial');
})->name('testimonial');

Route::get('/error', function () {
    return view('404');
})->name('error');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/pendaftaran', function () {
    return view('pendaftaran');
})->name('pendaftaran');

Route::post('/store-pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');

Route::get('/classes', [DetailKelasController::class, 'index'])->name('classes');

Route::get('/index', [DetailKelasController::class, 'home'])->name('index');


?>