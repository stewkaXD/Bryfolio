@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-5">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @if (session()->has('loginFail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('loginFail') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">LOGIN</h1>
            <form action="/login" method="POST">
        
                @csrf
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}" autofocus required>
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>   
                    @enderror
                </div>
        
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
        
                <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Log in</button>

            </form>

            <small class="d-block text-center mt-2">Not registered? <a href="/register" class="text-decoration-none">Register now</a></small>
        </main>

    </div>
</div>


@endsection