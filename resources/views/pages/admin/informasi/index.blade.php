@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="row align-items-center">
        <div class="col-sm-6 col-md-12">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </div>
    </div>
    <div class="card bg-secondary">
        <div class="card-body">
            <div class="row justify-content-between">
                <form class="col-lg-8 border-end pe-4" method="POST" action="{{ $informasis ? route('informasi.update', $informasis->id) : route('informasi.update', 0) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <h4 class="mb-3 text-white">Pengaturan Informasi LKBB</h4>
                    <div class="mb-3">
                        <label for="nama_lkbb" class="form-label">Nama LKBB</label>
                        <input type="text" class="form-control @error('nama_lkbb') is-invalid @enderror" id="nama_lkbb" name="nama_lkbb" value="{{ $informasis->nama_lkbb }}" required>
                        @error('nama_lkbb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="singkatan_lkbb" class="form-label">Singkatan LKBB</label>
                        <input type="text" class="form-control @error('singkatan_lkbb') is-invalid @enderror" id="singkatan_lkbb" name="singkatan_lkbb" value="{{ $informasis->singkatan_lkbb }}" required>
                        @error('singkatan_lkbb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cakupan" class="form-label">Cakupan</label>
                        <input type="text" class="form-control @error('cakupan') is-invalid @enderror" id="cakupan" name="cakupan" value="{{ $informasis->cakupan }}" required>
                        @error('cakupan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ $informasis->alamat }}" required>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="maps" class="form-label">Link Google Maps</label>
                        <input type="text" class="form-control @error('maps') is-invalid @enderror" id="maps" name="maps" value="{{ $informasis->maps }}" required>
                        @error('maps')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="keterangan_lkbb" class="form-label">Keterangan LKBB</label>
                        <textarea class="form-control @error('keterangan_lkbb') is-invalid @enderror" id="keterangan_lkbb" name="keterangan_lkbb" required>{{ $informasis->keterangan_lkbb }}</textarea>
                        @error('keterangan_lkbb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pendaftaran_buka" class="form-label">Pendaftaran Buka</label>
                        <input type="date" class="form-control @error('pendaftaran_buka') is-invalid @enderror" id="pendaftaran_buka" name="pendaftaran_buka" value="{{ $informasis->pendaftaran_buka }}" required>
                        @error('pendaftaran_buka')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pendaftaran_tutup" class="form-label">Pendaftaran Tutup</label>
                        <input type="date" class="form-control @error('pendaftaran_tutup') is-invalid @enderror" id="pendaftaran_tutup" name="pendaftaran_tutup" value="{{ $informasis->pendaftaran_tutup }}" required>
                        @error('pendaftaran_tutup')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="lokasi_pendaftaran" class="form-label">Lokasi Pendaftaran</label>
                        <input type="text" class="form-control @error('lokasi_pendaftaran') is-invalid @enderror" id="lokasi_pendaftaran" name="lokasi_pendaftaran" value="{{ $informasis->lokasi_pendaftaran }}" required>
                        @error('lokasi_pendaftaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tm" class="form-label">TM</label>
                        <input type="date" class="form-control @error('tm') is-invalid @enderror" id="tm" name="tm" value="{{ $informasis->tm }}" required>
                        @error('tm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="lokasi_tm" class="form-label">Lokasi TM</label>
                        <input type="text" class="form-control @error('lokasi_tm') is-invalid @enderror" id="lokasi_tm" name="lokasi_tm" value="{{ $informasis->lokasi_tm }}" required>
                        @error('lokasi_tm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pelaksanaan" class="form-label">Pelaksanaan</label>
                        <input type="date" class="form-control @error('pelaksanaan') is-invalid @enderror" id="pelaksanaan" name="pelaksanaan" value="{{ $informasis->pelaksanaan }}" required>
                        @error('pelaksanaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="lokasi_pelaksanaan" class="form-label">Lokasi Pelaksanaan</label>
                        <input type="text" class="form-control @error('lokasi_pelaksanaan') is-invalid @enderror" id="lokasi_pelaksanaan" name="lokasi_pelaksanaan" value="{{ $informasis->lokasi_pelaksanaan }}" required>
                        @error('lokasi_pelaksanaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="total_pembinaan" class="form-label">Total Pembinaan</label>
                        <input type="number" min=0 class="form-control @error('total_pembinaan') is-invalid @enderror" id="total_pembinaan" name="total_pembinaan" value="{{ $informasis->total_pembinaan }}" required>
                        @error('total_pembinaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="htm" class="form-label">HTM</label>
                        <input type="number" min=0 class="form-control @error('htm') is-invalid @enderror" id="htm" name="htm" value="{{ $informasis->htm }}" required>
                        @error('htm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="poster" class="form-label">Link Poster</label>
                        <input type="text" class="form-control @error('poster') is-invalid @enderror" id="poster" name="poster" value="{{ $informasis->poster }}" required>
                        @error('poster')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="rekom" class="form-label">Link Surat Rekomendasi</label>
                        <input type="text" class="form-control @error('rekom') is-invalid @enderror" id="rekom" name="rekom" value="{{ $informasis->rekom }}" required>
                        @error('rekom')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="juknis" class="form-label">Link Juknis</label>
                        <input type="text" class="form-control @error('juknis') is-invalid @enderror" id="juknis" name="juknis" value="{{ $informasis->juknis }}" required>
                        @error('juknis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Link E-Mail</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $informasis->email }}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="facebook" class="form-label">Link Facebook</label>
                        <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{ $informasis->facebook }}" required>
                        @error('facebook')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="instagram" class="form-label">Link Instagram</label>
                        <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" value="{{ $informasis->instagram }}" required>
                        @error('instagram')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tiktok" class="form-label">Link TikTok</label>
                        <input type="text" class="form-control @error('tiktok') is-invalid @enderror" id="tiktok" name="tiktok" value="{{ $informasis->tiktok }}" required>
                        @error('tiktok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="twitter" class="form-label">Link X/Twitter</label>
                        <input type="text" class="form-control @error('twitter') is-invalid @enderror" id="twitter" name="twitter" value="{{ $informasis->twitter }}" required>
                        @error('twitter')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="youtube" class="form-label">Link Youtube</label>
                        <input type="text" class="form-control @error('youtube') is-invalid @enderror" id="youtube" name="youtube" value="{{ $informasis->youtube }}" required>
                        @error('youtube')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="logo_paskibra" class="form-label">Logo Paskibra</label>
                        <input type="file" class="form-control @error('logo_paskibra') is-invalid @enderror" id="logo_paskibra" name="logo_paskibra">
                        @error('logo_paskibra')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="logo_lkbb" class="form-label">Logo LKBB</label>
                        <input type="file" class="form-control @error('logo_lkbb') is-invalid @enderror" id="logo_lkbb" name="logo_lkbb">
                        @error('logo_lkbb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark mb-3 mt-1">Simpan Perubahan Informasi</button>
                </form>
                <div class="col-lg-4 pe-4">
                    <h4 class="mb-3 text-white text-center">Logo LKBB</h4>
                    <div class="d-flex justify-content-between align-items-start w-100">
                        <div class="text-center me-3">
                            @if(!$informasis || $informasis->logo_lkbb == "" || $informasis->logo_lkbb == "-")
                            <img src="{{ url('frontend/images/Contoh Logo LKBB.png') }}" alt="Logo LKBB" class="img-thumbnail mb-3" style="max-width: 100%; height: auto;">
                            @else
                            <img src="{{ asset('storage/' . $informasis->logo_lkbb) }}" alt="Logo LKBB" class="img-thumbnail mb-3" style="max-width: 100%; height: auto;">
                            @endif
                        </div>
                    </div>
                    <hr>
                    <h4 class="mb-3 text-white text-center">Logo Paskibra</h4>
                    <div class="d-flex justify-content-between align-items-start w-100">
                        <div class="text-center me-3">
                            @if(!$informasis || $informasis->logo_paskibra == "" || $informasis->logo_paskibra == "-")
                            <img src="{{ url('frontend/images/Contoh Logo Paskibra.png') }}" alt="Logo LKBB" class="img-thumbnail mb-3" style="max-width: 100%; height: auto;">
                            @else
                            <img src="{{ asset('storage/' . $informasis->logo_paskibra) }}" alt="Logo LKBB" class="img-thumbnail mb-3" style="max-width: 100%; height: auto;">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection