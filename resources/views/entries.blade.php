@extends('layouts.main')

@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/entries">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit">Search!</button>
                </div>
            </form>
        </div>
    </div>

    @if ($entries->count() > 0)
        <div class="card mb-3">

            @if ($entries[0]->image)
                <div style="max-height: 300px; overflow:hidden">
                    <img src="{{ asset('storage/' .$entries[0]->image) }}" alt="{{ $entries[0]->category->name }}" class="img-fluid">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x300?{{ $entries[0]->category->name }}" class="card-img-top" alt="{{ $entries[0]->category->name }}">
            @endif

            <div class="card-body text-center">
                <h3 class="card-title"><a href="/entries/{{ $entries[0]->slug }}" class="text-decoration-none text-dark">{{ $entries[0]->title }}</a></h3>

                <p>
                    <small class="text-muted">
                        By: <a href="/entries?author={{ $entries[0]->author->username }}" class="text-decoration-none">{{ $entries[0]->author->name }}</a>
                        in <a href="/entries?category={{ $entries[0]->category->slug }}" class="text-decoration-none">{{ $entries[0]->category->name }}</a> {{ $entries[0]->created_at->diffForHumans() }}
                    </small>
                </p>

                <p class="card-text">{{ $entries[0]->excerpt }}</p>

                <a href="/entries/{{ $entries[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
            </div>
        </div>

        <div class="container mb-2">
            <div class="row">
                @foreach ($entries->skip(1) as $entry)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute bg-dark px-3 py-2 rounded"><a href="/entries?category={{ $entry->category->slug }}" class="text-decoration-none text-light">{{ $entry->category->name }}</a></div>

                            @if ($entry->image)
                                <img src="{{ asset('storage/' .$entry->image) }}" alt="{{ $entry->category->name }}" class="img-fluid">
                            @else
                                <img src="https://source.unsplash.com/500x250?{{ $entry->category->name }}" class="card-img-top" alt="{{ $entry->category->name }}">
                            @endif
                            
                            <div class="card-body">
                                <h5 class="card-title">{{  $entry->title }}</h5>
                                <p>
                                    <small class="text-muted">
                                        By: <a href="/entries?author={{ $entry->author->username }}" class="text-decoration-none">{{ $entry->author->name }}</a> 
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

    <div class="d-flex justify-content-center mb-3">
        {{ $entries->links() }}
    </div>
    

@endsection