@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('cp.index') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_cp" class="form-label">Nama CP</label>
                <input type="text" id="nama_cp" name="nama_cp" class="form-control @error('nama_cp') is-invalid @enderror" value="{{ old('nama_cp') }}" autofocus required placeholder="Masukkan Nama CP">
                @error('nama_cp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="noHp" class="form-label">No. HP</label>
                <input type="text" id="noHp" name="noHp" class="form-control @error('noHp') is-invalid @enderror" value="{{ old('noHp') }}" autofocus required placeholder="Masukkan No. HP CP">
                @error('noHp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="peran" class="form-label">Peran CP</label>
                <select class="form-select @error('peran') is-invalid @enderror" id="peran" name="peran" required>
                    <option value="" disabled selected>Pilih Peran CP</option>
                    <option value="AKUN" {{ old('peran') === '1' ? 'selected' : '' }}>AKUN</option>
                    <option value="PENDAFTARAN" {{ old('peran') === '2' ? 'selected' : '' }}>PENDAFTARAN</option>
                    <option value="JUKNIS" {{ old('peran') === '3' ? 'selected' : '' }}>JUKNIS</option>
                    <option value="BAZAR" {{ old('peran') === '4' ? 'selected' : '' }}>BAZAR</option>
                    <option value="PENGINAPAN" {{ old('peran') === '5' ? 'selected' : '' }}>PENGINAPAN</option>
                </select>
                @error('peran')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark mb-3">Save</button>
            <a href="{{ route('cp.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection