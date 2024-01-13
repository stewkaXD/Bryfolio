@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-5">

        <main class="form-register">
            <h1 class="h3 mb-3 fw-normal text-center">REGISTRATION</h1>
            <form action="/register" method="POST">

                @csrf
                <div class="form-floating">
                    <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="floatingName" placeholder="Name" value="{{ old('name') }}" required>
                    <label for="floatingName">Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>   
                    @enderror   
                </div>

                <div class="form-floating">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="floatingUsername" placeholder="Username" value="{{ old('username') }}"  required>
                    <label for="floatingUsername">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>   
                    @enderror
                </div>
        
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}"  required>
                    <label for="floatingInput">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>   
                    @enderror
                </div>
        
                <div class="form-floating">
                    <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>   
                    @enderror
                </div>
        
                <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register!</button>

            </form>

            <small class="d-block text-center mt-2">Already have an account? <a href="/login" class="text-decoration-none">Log in</a></small>
        </main>

    </div>
</div>


@endsection