<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Entry;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // nampilin entries berdasarkan user tertentu
    {
        return view('dashboard.entries.index', [
            'entries' => Entry::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //tampilin Add entry
    {
        return view('dashboard.entries.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //CREATE entry
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:entries',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('entry-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Entry::create($validatedData);

        return redirect('/dashboard/entries')->with('success', 'Success! Your entry has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Entry $entry) //READ entry
    {
        return view('dashboard.entries.show', [
            'entry' => $entry
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function edit(Entry $entry) //tampilin Edit entry
    {
        return view('dashboard.entries.edit', [
            'entry' => $entry,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry) //UPDATE entry
    {
        $rules = ([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required'
        ]);

        if ($request->slug != $entry->slug) {
            $rules['slug'] = 'required|unique:entries';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('entry-images');
        }

        Entry::where('id', $entry->id)->update($validatedData);

        return redirect('/dashboard/entries')->with('success', 'Your entry has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $entry) //DELETE entry (duh)
    {
        if($entry->image) {
            Storage::delete($entry->image);
        }

        Entry::destroy($entry->id);

        return redirect('/dashboard/entries')->with('success', 'Your entry has been successfully deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Entry::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
