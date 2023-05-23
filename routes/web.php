<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TrupeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RepertoireController;
use App\Http\Controllers\RepertuarasController;
use App\Http\Controllers\RenginiaiController;

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


Route::resource('repertoire', RepertoireController::class);




Route::get('/', [PageController::class, 'index']);
Route::get('/trupe',[TrupeController::class,'index'] ) ->name('trupe.index');

Route::get('/repertuaras', [App\Http\Controllers\RepertuarasController::class, 'index'])->name('repertuaras.index');
Route::get('/repertuaras/{repertoire:slug}', [App\Http\Controllers\RepertuarasController::class, 'show'])->name('repertuaras.show');
Route::get('/repertuaras/{slug}', [RepertuarasController::class, 'show'])->name('repertuaras.show');

Route::resource('events', EventController::class);

Route::get('events/{id}', [EventController::class, 'show'])->name('events.show');



Route::resource('actors', ActorController::class);

Route::get('/renginiai', [RenginiaiController::class,'index'])->name('renginiai.index');


require __DIR__.'/auth.php';




