@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-5">

        <main class="form-register">
            <h1 class="h3 mb-3 fw-normal text-center">REGISTRATION</h1>
            <form>

                <div class="form-floating">
                    <input type="text" name="name" class="form-control rounded-top" id="floatingName" placeholder="Name">
                    <label for="floatingName">Name</label>
                </div>

                <div class="form-floating">
                    <input type="text" name="username" class="form-control" id="floatingUsername" placeholder="Username">
                    <label for="floatingUsername">Username</label>
                </div>
        
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
        
                <div class="form-floating">
                    <input type="password" name="password" class="form-control rounded-bottom" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
        
                <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register!</button>

            </form>

            <small class="d-block text-center mt-2">Already have an account? <a href="/login" class="text-decoration-none">Log in</a></small>
        </main>

    </div>
</div>


@endsection