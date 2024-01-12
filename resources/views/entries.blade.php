@extends('layouts.main')

@section('container')
    <h1 class="mb-4">{{ $title }}</h1>

    @if ($entries->count() > 0)
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x300?{{ $entries[0]->category->name }}" class="card-img-top" alt="{{ $entries[0]->category->name }}">

            <div class="card-body text-center">
                <h3 class="card-title"><a href="/entries/{{ $entries[0]->slug }}" class="text-decoration-none text-dark">{{ $entries[0]->title }}</a></h3>

                <p>
                    <small class="text-muted">
                        By: <a href="/authors/{{ $entries[0]->author->username }}" class="text-decoration-none">{{ $entries[0]->author->name }}</a>
                        in <a href="/categories/{{ $entries[0]->category->slug }}" class="text-decoration-none">{{ $entries[0]->category->name }}</a> {{ $entries[0]->created_at->diffForHumans() }}
                    </small>
                </p>

                <p class="card-text">{{ $entries[0]->excerpt }}</p>

                <a href="/entries/{{ $entries[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($entries->skip(1) as $entry)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute bg-dark px-3 py-2 rounded"><a href="/categories/{{ $entry->category->slug }}" class="text-decoration-none text-light">{{ $entry->category->name }}</a></div>

                            <img src="https://source.unsplash.com/500x250?{{ $entry->category->name }}" class="card-img-top" alt="{{ $entry->category->name }}">
                            
                            <div class="card-body">
                                <h5 class="card-title">{{  $entry->title }}</h5>
                                <p>
                                    <small class="text-muted">
                                        By: <a href="/authors/{{ $entry->author->username }}" class="text-decoration-none">{{ $entry->author->name }}</a> 
                                        {{ $entry->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{{ $entry->excerpt }}</p>
                                <a href="/entries/{{ $entry->slug }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No post found...</p>
    @endif
    
@endsection