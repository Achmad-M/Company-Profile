<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\DetailKelasController;
use App\Http\Controllers\PenggunaAdmin;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\isLogin;

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

Route::get('/classes', [DetailKelasController::class, 'index'])->name('classes'); // update kelas terisi berapa


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

Route::post('/store-pengguna/{id}', [PenggunaController::class, 'store'])->name('pengguna.store');

Route::get('/index', [DetailKelasController::class, 'home'])->name('index');

Route::get('/add-user', function () {
    $user = new App\Models\Admin;
    $user->nama = 'admin';
    $user->password = Hash::make('123');
    $user->no_hp = '08123';
    $user->email = '10221030@student.itk.ac.id';
    $user->save();

    return redirect()->route('login');
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::group(['middleware' => [isLogin::class]], function () {
    Route::get('/admin-pengguna-create', function () {
        return view('admin-pengguna-create');
    })->name('admin-pengguna-create');

    Route::get('/admin-pengguna-index', [PenggunaAdmin::class, 'index'])->name('admin-pengguna-index');

    Route::post('/admin-pengguna-create/store', [PenggunaAdmin::class, 'store'])->name('admin-pengguna-create.store');

    Route::put('/update/{id}', [PenggunaAdmin::class, 'update']);

    Route::delete('/delete/{id}', [PenggunaAdmin::class, 'destroy']);
});


    

?>