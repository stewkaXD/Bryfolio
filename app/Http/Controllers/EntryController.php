<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;

class EntryController extends Controller
{
    public function showAll()
    {
        return view('entries', [
            "title" => "All Entries",
            "active" => "entries", //buat nyalain navbar
            // "entries" => Entry::all()
            "entries" => Entry::latest()->get()
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
