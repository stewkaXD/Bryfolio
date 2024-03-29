@extends('dashboard.dash-layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Entry</h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/entries/{{ $entry->slug }}" method="POST" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required value="{{ old('title', $entry->title) }}" autofocus>
          @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly value="{{ old('slug',  $entry->slug) }}">
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Pick a category for your entry</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                    @if (old('category_id', $entry->category_id) == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Upload image (optional)</label>
            <input type="hidden" name="oldImage" value="{{ $entry->image }}">

            @if ($entry->image)
                <img src="{{ asset('storage/' . $entry->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif

            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input id="body" type="hidden" name="body" value="{{ old('body',  $entry->body) }}">
            <trix-editor input="body"></trix-editor>
            @error('body')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update entry!</button>
    </form>
</div>

<script>
    const title = document.querySelector("#title");
    const slug = document.querySelector("#slug");

    title.addEventListener('change', function() {
        fetch('/dashboard/entries/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    //Remove the "attach file" for a bit (2)
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();

        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection