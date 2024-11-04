@extends('layouts.app')

@section('content')
<main class="signup-form" style="background-color: #121212; min-height: 100vh;"> <!-- Set full dark background and minimum height for viewport -->
    <div class="container h-100 d-flex justify-content-center align-items-center"> <!-- Center container horizontally and vertically -->
        <div class="col-md-4">
            <div class="card shadow border-0" style="background-color: #1f1f1f;"> <!-- Card with dark background, no border, and shadow -->
                <h3 class="card-header text-center bg-dark text-white">Register User</h3> <!-- Dark header background with white text -->
                <div class="card-body">
                    <form action="{{ route('register.custom') }}" method="POST"> <!-- Form submission route -->
                        @csrf <!-- CSRF token for security -->

                        <div class="mb-3">
                            <input type="text" placeholder="Name" id="name" class="form-control bg-dark text-white" name="name" required autofocus> <!-- Dark input background and white text -->
                            @if ($errors->has('name')) <!-- Error display for name field -->
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <input type="email" placeholder="Email" id="email_address" class="form-control bg-dark text-white" name="email" required> <!-- Dark input background and white text -->
                            @if ($errors->has('email')) <!-- Error display for email field -->
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <input type="password" placeholder="Password" id="password" class="form-control bg-dark text-white" name="password" required> <!-- Dark input background and white text -->
                            @if ($errors->has('password')) <!-- Error display for password field -->
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <input type="password" placeholder="Confirm Password" id="password_confirmation" class="form-control bg-dark text-white" name="password_confirmation" required> <!-- Dark input background and white text -->
                            @if ($errors->has('password_confirmation')) <!-- Error display for password confirmation field -->
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-light">Register</button> <!-- Light-colored button to stand out on dark background -->
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3 text-white"> <!-- Centered footer text with white color -->
                Already have an account? <a href="{{ route('login') }}" class="text-info">Login</a> <!-- Highlighted link to login page in info color -->
            </div>
        </div>
    </div>
</main>
@endsection
