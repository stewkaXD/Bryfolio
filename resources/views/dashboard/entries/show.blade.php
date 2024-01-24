@extends('dashboard.dash-layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $entry->title }}</h1>

            <a href="/dashboard/entries" class="btn btn-secondary"><span data-feather="arrow-left"></span> Back to my entries</a>
            <a href="/dashboard/entries/{{ $entry->slug }}/edit" class="btn btn-warning"><span data-feather="edit-2"></span> Edit</a>
            <form action="/dashboard/entries/{{ $entry->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="trash"></span> Delete</button>
            </form>

            @if ($entry->image)
                <div style="max-height: 350px; overflow:hidden">
                    <img src="{{ asset('storage/' .$entry->image) }}" alt="{{ $entry->category->name }}" class="img-fluid mt-3">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $entry->category->name }}" alt="{{ $entry->category->name }}" class="img-fluid mt-3">
            @endif


    
            <article class="mb-5 mt-3 fs-5">
                <small>{!! $entry->body !!}</small>
            </article>
        </div>
    </div>
</div> 

@endsection