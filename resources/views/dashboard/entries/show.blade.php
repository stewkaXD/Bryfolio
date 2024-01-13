@extends('dashboard.dash-layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-lg-8">
            <h1>{{ $entry->title }}</h1>

            <div class="my-3">
                <a href="/dashboard/entries" class="btn btn-secondary"><span data-feather="arrow-left"></span> Back to my entries</a>
                <a href="" class="btn btn-warning"><span data-feather="edit-2"></span> Edit</a>
                <a href="" class="btn btn-danger"><span data-feather="trash"></span> Delete</a>
            </div>

            <img src="https://source.unsplash.com/1200x400?{{ $entry->category->name }}" alt="{{ $entry->category->name }}" class="img-fluid">
    
            <article class="mb-5 mt-3 fs-5">
                {!! $entry->body !!}
            </article>
        </div>
    </div>
</div> 

@endsection