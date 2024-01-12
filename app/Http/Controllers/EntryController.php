<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\User;

class EntryController extends Controller
{
    public function showAll()
    {
        $title='';

        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('entries', [
            "title" => "All Entries" . $title,
            "active" => "entries", //buat nyalain navbar
            "entries" => Entry::latest()->searchfilter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    // dlunya ngirim data pake id ($id) ato $slug
    // tpi udh ga butuh karena adanya Route Model Binding
    // lgsung kirim Entry/Postnya
    // diikat disini tuh         ↓
    public function showOne(Entry $entry)
    {
        return view ('entry', [
            "title" => 'Single Entry',
            "active" => "entries", //buat nyalain navbar
            "entry" => $entry
        ]);
    }
}
