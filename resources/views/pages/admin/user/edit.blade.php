@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">Edit Data {{ $user->name }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" autofocus required placeholder="Masukkan Nama Lengkap">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $user->username) }}" required placeholder="Masukkan Username">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required placeholder="example@example.com">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="myInput" name="password" placeholder="Masukkan Password" aria-describedby="basic-addon2">
                    <div class="align-items-center">
                        <span class="input-group-text" id="basic-addon2">
                            <i class="fa-solid fa-eye-slash pointer" id="hide" onclick="myFunction()"></i>
                            &nbsp;
                            <i class="fa-solid fa-eye pointer" id="show" onclick="myFunction()"></i>
                        </span>
                    </div>
                </div>
                @error('password')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level Pengguna</label>
                <select class="form-select @error('level') is-invalid @enderror" id="level" name="level" required>
                    <option value="" disabled selected>Choose One</option>
                    <option value="1ADMIN" {{ old('level', $user->level) === '1ADMIN' ? 'selected' : '' }}>Admin</option>
                    <option value="2JURIPBB" {{ old('level', $user->level) === '2JURIPBB' ? 'selected' : '' }}>Juri PBB</option>
                    <option value="3JURIVARFOR" {{ old('level', $user->level) === '3JURIVARFOR' ? 'selected' : '' }}>Juri Varfor</option>
                    <option value="4PESERTA" {{ old('level', $user->level) === '4PESERTA' ? 'selected' : '' }}>Peserta</option>
                    <option value="5CALONPESERTA" {{ old('level', $user->level) === '5CALONPESERTA' ? 'selected' : '' }}>Calon Peserta</option>
                </select>
                @error('level')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark mb-3">Simpan Perubahan</button>
            <a href="{{ route('user.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection