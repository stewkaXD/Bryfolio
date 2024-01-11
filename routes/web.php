<?php

use App\Http\Controllers\EntryController;
use App\Models\Entry; // ini isi manual buat konek ke Controller
use App\Models\Category;
use App\Models\User;
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

Route::get('/diary', [EntryController::class, 'showAll']);
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

Route::get('/categories/{category:slug}', function(Category $category) {
    return view('entries', [
        'title' => "Entry by Category: $category->name",
        'active' => 'categories',
        'entries' => $category->entries,
    ]);
});


Route::get('/authors/{author:username}', function(User $author) {
    return view('entries', [
        'title' => "Entries by Author: $author->name",
        'entries' => $author->entries->load('category', 'author'),
        'active' => 'author'
    ]);
});