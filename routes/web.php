<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ValidarController;
use App\Http\Controllers\PerfilController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('web')->group(function() {

    Route::get('/login', [ValidarController::class, 'index'])->name('inicio');
    Route::post('/login', [ValidarController::class, 'login'])->name('Validar');

    Route::get('/logout', [ValidarController::class, 'logout'])->name('logout');

    
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);


    Route::middleware('auth')->group(function(){
        Route::get('/admin/dashboard', function (){
            return view('Interfaz.dashboard_admin');
        })->name('admin.dashboard')->middleware('is_admin');

        Route::get('/user/dashboard', function (){
            return view('Interfaz.dashboard_user');
        })->name('user.dashboard');
    });

    Route::get('/user/dashboard/perfil', [PerfilController::class, 'index'])->name('perfil');
});
