@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class=mb-3>{{ $entry->title }}</h1>

                <p>
                    By: <a href="/authors/{{ $entry->author->username }}" class="text-decoration-none">{{ $entry->author->name }}</a> in <a href="/categories/{{ $entry->category->slug }}" class="text-decoration-none">{{ $entry->category->name }}</a>
                </p>

                <img src="https://source.unsplash.com/1200x400?{{ $entry->category->name }}" alt="{{ $entry->category->name }}" class="img-fluid">
        
                <article class="my-3 fs-5">
                    {!! $entry->body !!}
                </article>

                <a href="/diary" class="text-decoration-none d-block my-4 pb-4">Back to Diary Entries</a>
            </div>
        </div>
    </div>

    <article>
        
        



    </article>

    
@endsection