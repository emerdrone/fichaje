<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\LocalidadController;
use App\Http\Controllers\ProvinController;
use App\Http\Controllers\TerritorioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/prueba', function () {
    return view('prueba');
});

Route::get('/administrador', [AdminController::class, 'index'])->name('administrador');

Route::resource('/localidad', LocalidadController::class)->names('localidad');
Route::post('import-list-excel-localidad', [LocalidadController::class, 'import'])->name('localidad.excel');
Route::get('/localidadsrestaurar', [LocalidadController::class, 'restaurar'])->name('localidad.restaurar');
Route::get('/localidad/{id}/restore', [LocalidadController::class, 'restore'])->name('localidad.restore');
Route::get('/localidads/{id}/forceDelete', [LocalidadController::class, 'forceDelete'])->name('localidad.forceDelete');
Route::get('localidadsdata', [LocalidadController::class, 'locali'])->name('localidadsdata');


Route::resource('/provin', ProvinController::class)->names('provin');
Route::post('import-list-excel-provin', [ProvinController::class, 'import'])->name('provin.excel');
Route::get('/prrovinrestaurar', [ProvinController::class, 'restaurar'])->name('provin.restaurar');
Route::get('/provins/{id}/restore', [ProvinController::class, 'restore'])->name('provin.restore');
Route::get('/provins/{id}/forceDelete', [ProvinController::class, 'forceDelete'])->name('provin.forceDelete');



Route::get('towns/{id}', [ProvinController::class, 'getTowns']);
Route::get('provins', [ProvinController::class, 'provi'])->name('docuprovi.provin');

Route::resource('/user', UserController::class)->names('user');
Route::post('import-list-excel-user', [UserController::class, 'import'])->name('user.excel');
Route::get('/usersrestaurar', [UserController::class, 'restaurar'])->name('user.restaurar');
Route::get('/users/{id}/restore', [UserController::class, 'restore'])->name('user.restore');
Route::get('/users/{id}/forceDelete', [UserController::class, 'forceDelete'])->name('user.forceDelete');

Route::resource('/empresa', EmpresaController::class)->names('empresa');
Route::post('import-list-excel-empresa', [EmpresaController::class, 'import'])->name('empresa.excel');
Route::get('/empresasrestaurar', [EmpresaController::class, 'restaurar'])->name('empresa.restaurar');
Route::get('/empresas/{id}/restore', [EmpresaController::class, 'restore'])->name('empresa.restore');
Route::get('/empresas/{id}/forceDelete', [EmpresaController::class, 'forceDelete'])->name('empresa.forceDelete');

Route::resource('/territorio', TerritorioController::class)->names('territorio');
Route::post('import-list-excel-territorio', [TerritorioController::class, 'import'])->name('territorio.excel');
Route::get('/territoriosrestaurar', [TerritorioController::class, 'restaurar'])->name('territorio.restaurar');
Route::get('/territorios/{id}/restore', [TerritorioController::class, 'restore'])->name('territorio.restore');
Route::get('/territorios/{id}/forceDelete', [TerritorioController::class, 'forceDelete'])->name('territorio.forceDelete');


