<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DetailKelasController;
use App\Http\Controllers\PenggunaAdmin;
use App\Http\Controllers\KelasAdmin;
use App\Http\Controllers\WaktuKelasAdmin;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SesiKelasController;
use App\Http\Controllers\HariKelasController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\DashboardKelasController;
use App\Http\Controllers\DetailKelasAdminController;
use App\Http\Controllers\PenggunaKelasController;
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

    Route::get('/admin-kelas-index', [KelasAdmin::class, 'index'])->name('admin-kelas-index');

// routes/web.php
Route::get('/admin-waktukelas', [WaktuKelasAdmin::class, 'index'])->name('admin-waktukelas');
Route::post('/admin-waktukelas', [WaktuKelasAdmin::class, 'store']);
Route::get('/admin-waktukelas/{waktu_kelas}/edit', [WaktuKelasAdmin::class, 'edit']);
Route::put('/admin-waktukelas/{waktu_kelas}', [WaktuKelasAdmin::class, 'update']);
Route::delete('/admin-waktukelas/{waktu_kelas}', [WaktuKelasAdmin::class, 'destroy']);



Route::get('/admin-sesikelas', [SesiKelasController::class, 'index'])->name('admin-sesikelas');
Route::post('/admin-sesikelas', [SesiKelasController::class, 'store']);
Route::get('/admin-sesikelas/{sesi_kelas}/edit', [SesiKelasController::class, 'edit']);
Route::put('/admin-sesikelas/{sesi_kelas}', [SesiKelasController::class, 'update']);
Route::delete('/admin-sesikelas/{sesi_kelas}', [SesiKelasController::class, 'destroy']);



Route::get('/admin-harikelas', [HariKelasController::class, 'index'])->name('admin-harikelas');
Route::post('/admin-harikelas', [HariKelasController::class, 'store']);
Route::get('/admin-harikelas/{hari_kelas}/edit', [HariKelasController::class, 'edit']);
Route::put('/admin-harikelas/{hari_kelas}', [HariKelasController::class, 'update']);
Route::delete('/admin-harikelas/{hari_kelas}', [HariKelasController::class, 'destroy']);

Route::get('/admin-pengajar', [PengajarController::class, 'index'])->name('admin-pengajar');
Route::post('/admin-pengajar', [PengajarController::class, 'store']);
Route::get('/admin-pengajar/{pengajar}/edit', [PengajarController::class, 'edit']);
Route::put('/admin-pengajar/{pengajar}', [PengajarController::class, 'update']);
Route::delete('/admin-pengajar/{pengajar}', [PengajarController::class, 'destroy']);


Route::get('/admin-kelas', [DashboardKelasController::class, 'index'])->name('admin-kelas');
Route::post('/admin-kelas', [DashboardKelasController::class, 'store']);
Route::get('/admin-kelas/{kelas}/edit', [DashboardKelasController::class, 'edit']);
Route::put('/admin-kelas/{kelas}', [DashboardKelasController::class, 'update']);
Route::delete('/admin-kelas/{kelas}', [DashboardKelasController::class, 'destroy']);

Route::get('/admin-detailkelas', [DetailKelasAdminController::class, 'index'])->name('admin-detailkelas');
Route::post('/admin-detailkelas', [DetailKelasAdminController::class, 'store']);
Route::get('/admin-detailkelas/{detail_kelas}/edit', [DetailKelasAdminController::class, 'edit']);
Route::put('/admin-detailkelas/{detail_kelas}', [DetailKelasAdminController::class, 'update']);
Route::delete('/admin-detailkelas/{detail_kelas}', [DetailKelasAdminController::class, 'destroy'])->name('admin-detailkelas.destroy');

Route::get('/admin-penggunakelas', [PenggunaKelasController::class, 'index']);
Route::post('/admin-penggunakelas', [PenggunaKelasController::class, 'store']);
Route::get('/admin-penggunakelas/{pengguna_kelas}/edit', [PenggunaKelasController::class, 'edit']);
Route::put('/admin-penggunakelas/{pengguna_kelas}', [PenggunaKelasController::class, 'update']);
Route::delete('/admin-penggunakelas/{pengguna_kelas}', [PenggunaKelasController::class, 'destroy']);






});


    

?>