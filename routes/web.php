<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PluginController;
use Modules\Http\Controllers\MoneyController;

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

Route::get('/', [PluginController::class, 'index'])->name("home");

Route::get('/ventas', [PluginController::class, 'ventas'])->name("ventas");
Route::get('convert/{id}', [PluginController::class, 'convert'])->name('convert');

Route::get('/plugins', [PluginController::class, 'insert'])->name("insert");

Route::post('/plugins', [PluginController::class, 'save'])->name("save");

Route::get('/modules', [PluginController::class, 'modules'])->name("modules");

Route::get('/modules/{id}', [PluginController::class, 'delete'])->name("delete");