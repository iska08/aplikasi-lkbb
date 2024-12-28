@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('timeline.index') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="tgl_pendaftaran_buka" class="form-label">Tanggal Pendaftaran Buka</label>
                <input type="date" id="tgl_pendaftaran_buka" name="tgl_pendaftaran_buka" class="form-control @error('tgl_pendaftaran_buka') is-invalid @enderror" value="{{ old('tgl_pendaftaran_buka') }}" autofocus required>
                @error('tgl_pendaftaran_buka')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tgl_pendaftaran_tutup" class="form-label">Tanggal Pendaftaran Tutup</label>
                <input type="date" id="tgl_pendaftaran_tutup" name="tgl_pendaftaran_tutup" class="form-control @error('tgl_pendaftaran_tutup') is-invalid @enderror" value="{{ old('tgl_pendaftaran_tutup') }}" autofocus required>
                @error('tgl_pendaftaran_tutup')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="lokasi_pendaftaran" class="form-label">Lokasi Pendaftaran</label>
                <input type="text" id="lokasi_pendaftaran" name="lokasi_pendaftaran" class="form-control @error('lokasi_pendaftaran') is-invalid @enderror" value="{{ old('lokasi_pendaftaran') }}" autofocus required placeholder="Masukkan Lokasi Pendaftaran">
                @error('lokasi_pendaftaran')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tgl_tm" class="form-label">Tanggal Technical Meeting</label>
                <input type="date" id="tgl_tm" name="tgl_tm" class="form-control @error('tgl_tm') is-invalid @enderror" value="{{ old('tgl_tm') }}" autofocus required>
                @error('tgl_tm')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="lokasi_tm" class="form-label">Lokasi Technical Meeting</label>
                <input type="text" id="lokasi_tm" name="lokasi_tm" class="form-control @error('lokasi_tm') is-invalid @enderror" value="{{ old('lokasi_tm') }}" autofocus required placeholder="Masukkan Lokasi Technical Meeting">
                @error('lokasi_tm')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tgl_pelaksanaan" class="form-label">Tanggal Pelaksanaan</label>
                <input type="date" id="tgl_pelaksanaan" name="tgl_pelaksanaan" class="form-control @error('tgl_pelaksanaan') is-invalid @enderror" value="{{ old('tgl_pelaksanaan') }}" autofocus required>
                @error('tgl_pelaksanaan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="lokasi_pelaksanaan" class="form-label">Lokasi Pelaksanaan</label>
                <input type="text" id="lokasi_pelaksanaan" name="lokasi_pelaksanaan" class="form-control @error('lokasi_pelaksanaan') is-invalid @enderror" value="{{ old('lokasi_pelaksanaan') }}" autofocus required placeholder="Masukkan Lokasi Pelaksanaan">
                @error('lokasi_pelaksanaan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark mb-3">Save</button>
            <a href="{{ route('timeline.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection