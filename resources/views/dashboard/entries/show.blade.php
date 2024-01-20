@extends('dashboard.dash-layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $entry->title }}</h1>

            <a href="/dashboard/entries" class="btn btn-secondary"><span data-feather="arrow-left"></span> Back to my entries</a>
            <a href="" class="btn btn-warning"><span data-feather="edit-2"></span> Edit</a>
            <a href="" class="btn btn-danger"><span data-feather="trash"></span> Delete</a>

            <img src="https://source.unsplash.com/1200x400?{{ $entry->category->name }}" alt="{{ $entry->category->name }}" class="img-fluid mt-3">
    
            <article class="mb-5 mt-3 fs-5">
                <small>{!! $entry->body !!}</small>
            </article>
        </div>
    </div>
</div> 

@endsection