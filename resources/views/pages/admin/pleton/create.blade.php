@extends('layouts.admin')
@section('content')
@php
    use App\Models\Peserta;
    $userId = auth()->user()->id;
    $peserta = Peserta::where('user_id', $userId)->first();
    $isBatal = $peserta && $peserta->status === 'BATAL'; // Periksa apakah status peserta adalah "BATAL"
@endphp
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('pleton.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_anggota" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama_anggota') is-invalid @enderror" id="nama_anggota" name="nama_anggota" value="{{ old('nama_anggota') }}" required placeholder="Masukkan Nama" {{ $isBatal ? 'disabled' : '' }}>
                @error('nama_anggota')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kelas_anggota" class="form-label">Kelas</label>
                <input type="text" class="form-control @error('kelas_anggota') is-invalid @enderror" id="kelas_anggota" name="kelas_anggota" value="{{ old('kelas_anggota') }}" required placeholder="Masukkan Kelas" {{ $isBatal ? 'disabled' : '' }}>
                @error('kelas_anggota')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nis_anggota" class="form-label">NIS</label>
                <input type="text" class="form-control @error('nis_anggota') is-invalid @enderror" id="nis_anggota" name="nis_anggota" value="{{ old('nis_anggota') }}" required placeholder="Masukkan NIS" {{ $isBatal ? 'disabled' : '' }}>
                @error('nis_anggota')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="posisi" class="form-label">Posisi</label>
                <select class="form-select @error('posisi') is-invalid @enderror" id="posisi" name="posisi" required {{ $isBatal ? 'disabled' : '' }}>
                    <option value="" disabled selected>Pilih Posisi</option>
                    @foreach ($posisis as $posisi)
                        <option value="{{ $posisi->id }}" {{ old('posisi') == $posisi->id ? 'selected' : '' }}>{{ $posisi->nama_posisi }}</option>
                    @endforeach
                </select>
                @error('posisi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="foto_anggota" class="form-label">Foto</label>
                <input type="file" class="form-control @error('foto_anggota') is-invalid @enderror" id="foto_anggota" name="foto_anggota" {{ $isBatal ? 'disabled' : '' }}>
                @error('foto_anggota')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark mb-3" {{ $isBatal ? 'disabled' : '' }}>Simpan</button>
            <a href="{{ route('pleton.index') }}" class="btn btn-danger mb-3 {{ $isBatal ? 'disabled' : '' }}">Cancel</a>
        </form>
    </div>
</div>
@endsection