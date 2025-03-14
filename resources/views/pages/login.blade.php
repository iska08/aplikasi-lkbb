@extends('layouts.login')
@section('title')
    Login
@endsection
@section('content')
<!-- ======= Main ======= -->
<section class="my-login-page">
    <div class="container form-Bg">
        <div class="row justify-content-md-center">
            <div class="card-wrapper">
                <div class="brand">
                    <img src="{{ url('frontend/images/Lock.png') }}" alt="logo" />
                </div>
                <div class="card fat">
                    <div class="card-body">
                        {{-- login --}}
                        <h4 class="card-title text-center">Login</h4>
                        <form action="{{ route('login.index') }}" method="POST" class="my-login-validation" novalidate="">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username atau Email</label>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="" required autofocus placeholder="Masukkan Password atau Email" />
                                <div class="invalid-feedback">Email is invalid</div>
                            </div>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="mb-3">
                                <label for="password" class="form-label">Password </label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Masukkan Password" />
                                <div class="invalid-feedback">Password is required</div>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input" />
                                <label for="remember" class="form-check-label" name="remember">Remember Me</label>
                            </div>
                            <div class="m-0 d-grid">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>
                            </div>
                            <br>
                            <p>
                                @if ($cps && $cps->count() > 0)
                                Lupa Password? 
                                <a href="https://wa.me/{{ preg_replace('/^0/', '62', $cps->first()->noHp) }}" target="_blank">
                                    Hubungi Admin Untuk Memperbarui Password
                                </a>
                                @else
                                    Lupa Password? Hubungi Admin.
                                @endif
                            </p>
                            <p>Belum punya akun? <a href="{{ route('register.index') }}">Daftar di Sini</a></p>
                        </form>
                    </div>
                </div>
                <div class="footer">
                    <p>
                        Copyright &copy; {{ now()->year }} &mdash; Nama LKBB
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection