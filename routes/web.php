<?php

use App\Models\Category;

use App\Http\Controllers\EntryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardEntryController;
use Illuminate\Support\Facades\Route;

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
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Bryan Amadeus",
        "email" => "bryan.amadeus45@gmail.com",
        "image" => "literallyme.jpg",
        "active" => "about"
    ]);
});

Route::get('/entries', [EntryController::class, 'showAll']);
// Route::get('/diary', function () {
//     return view('entries', [
//         "title" => "Entries",
//         "entries" => Entry::all()
//     ]);
// });

// === Halaman single Entry ===
// ngirim ke controller udh bukan ID, tapi Entrynya lgsung -> /entries/{entry}
// yg dikirimin default itu id-nya, tambahin titik dua klo kirim laen -> /entries/{entry:slug}
Route::get('/entries/{entry:slug}', [EntryController::class, 'showOne']);
// Route::get('/entries/{slug}', function($slug) {
//     return view ('entry', [
//         "title" => "Single Entry",
//         "entry" => Entry::find($slug)
//     ]);
// });

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Entry Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/entries', DashboardEntryController::class)->middleware('auth');