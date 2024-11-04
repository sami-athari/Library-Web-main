@extends('layouts.app')

@section('content')
<main class="login-form" style="background-color: #121212; min-height: 100vh;">
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="card shadow border-0" style="background-color: #1f1f1f;">
                <h3 class="card-header text-center bg-dark text-white">Login</h3>
                <div class="card-body">
                    <form method="POST" action="{{ route('login.custom') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="text" placeholder="Email or Name" id="login" class="form-control bg-dark text-white" name="login" required autofocus>
                            @if ($errors->has('login'))
                            
                                <span class="text-danger">{{ $errors->first('login') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <input type="password" placeholder="Password" id="password" class="form-control bg-dark text-white" name="password" required>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label text-white" for="remember">Ingat Akun Saya</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-light">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3 text-white">
                Belum ada Akun? <a href="{{ route('register-user') }}" class="text-info">Registrasi</a>
            </div>
        </div>
    </div>
</main>
@endsection
