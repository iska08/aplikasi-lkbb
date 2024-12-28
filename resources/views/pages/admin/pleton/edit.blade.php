@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('pleton.update', $edPleton->id) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nama_anggota" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama_anggota') is-invalid @enderror" id="nama_anggota" name="nama_anggota" value="{{ old('nama_anggota', $edPleton->nama_anggota) }}" autofocus required>
                @error('nama_anggota')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kelas_anggota" class="form-label">Kelas</label>
                <input type="text" class="form-control @error('kelas_anggota') is-invalid @enderror" id="kelas_anggota" name="kelas_anggota" value="{{ old('kelas_anggota', $edPleton->kelas_anggota) }}" autofocus required>
                @error('kelas_anggota')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nis_anggota" class="form-label">NIS</label>
                <input type="text" class="form-control @error('nis_anggota') is-invalid @enderror" id="nis_anggota" name="nis_anggota" value="{{ old('nis_anggota', $edPleton->nis_anggota) }}" autofocus required>
                @error('nis_anggota')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="posisi" class="form-label">Posisi</label>
                <select class="form-select" name="posisi">
                    <option value="" disabled selected>Pilih Posisi</option>
                    @foreach ($posisis as $posisi)
                        @if (old('posisi', $edPleton->posisi) == $posisi->id)
                            <option value="{{ $posisi->id }}" selected>{{ $posisi->nama_posisi }}</option>
                        @else
                            <option value="{{ $posisi->id }}">{{ $posisi->nama_posisi }}</option>
                        @endif
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
                <input type="file" class="form-control @error('foto_anggota') is-invalid @enderror" id="foto_anggota" name="foto_anggota" autofocus>
                @error('foto_anggota')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark mb-3">Simpan Perubahan</button>
            <a href="/dashboard/pletons" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection