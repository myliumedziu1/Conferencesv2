<?php

use Illuminate\Support\Facades\Route;
use App\Models\conferences;
use App\Models\EventList;
use App\Http\Controllers\EventListController;
use App\Http\Controllers\PageController;
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
Route::resource('events', EventListController::class);


Route::get('/', [PageController::class, 'index']);

Route::get('/submit', function () {
    return view('form');
});

Route::get('/content', function () {
    return view('events');
});

Route::post('/submit',function (){
   $article = new Conferences();
   $article->name = request('name');
    $article->surname = request('surname');
   $article->email = request('email');
   $article->phone = request('phone');
   $article->save();
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/create', function () {
    return view('create');
})->middleware(['auth'])->name('create');

Route::get('/edit', function () {
    return view('edit');
})->middleware(['auth'])->name('edit');


require __DIR__.'/auth.php';


