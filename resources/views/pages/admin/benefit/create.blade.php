@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('benefit.index') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="tingkatan_id" class="form-label">Tingkatan</label>
                <select class="form-select @error('tingkatan_id') is-invalid @enderror" id="tingkatan_id" name="tingkatan_id" required>
                    <option value="" disabled selected>Pilih Tingkatan</option>
                    @foreach ($tingkatans as $tingkatan)
                        <option value="{{ $tingkatan->id }}" {{ old('tingkatan_id') == $tingkatan->id ? 'selected' : '' }}>{{ $tingkatan->nama_tingkatan }}</option>
                    @endforeach
                </select>
                @error('tingkatan_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama_juara" class="form-label">Nama Juara</label>
                <input type="text" id="nama_juara" name="nama_juara" class="form-control @error('nama_juara') is-invalid @enderror" value="{{ old('nama_juara') }}" autofocus required placeholder="Masukkan Nama Juara">
                @error('nama_juara')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="trophy" class="form-label">Jenis Trophy</label>
                <select id="trophy" name="trophy" class="form-select @error('trophy') is-invalid @enderror" required>
                    <option value="" disabled selected>Pilih Jenis Trophy</option>
                    @php
                    $options = [
                        'TROPHY BERGILIR',
                        'TROPHY TETAP',
                    ];
                    @endphp
                    @foreach ($options as $option)
                    <option value="{{ $option }}" {{ old('trophy') == $option ? 'selected' : '' }}>
                        {{ $option }}
                    </option>
                    @endforeach
                </select>
                @error('trophy')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="hadiah" class="form-label">Jenis Hadiah</label>
                <select id="hadiah" name="hadiah" class="form-select @error('hadiah') is-invalid @enderror" required>
                    <option value="" disabled selected>Pilih Jenis Hadiah</option>
                    @php
                    $options = [
                        'SERTIFIKAT',
                        'TIDAK ADA',
                    ];
                    @endphp
                    @foreach ($options as $option)
                    <option value="{{ $option }}" {{ old('hadiah') == $option ? 'selected' : '' }}>
                        {{ $option }}
                    </option>
                    @endforeach
                </select>
                @error('hadiah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="uang" class="form-label">Uang Pembinaan</label>
                <input type="number" min=0 class="form-control @error('uang') is-invalid @enderror" id="uang" name="uang" value="{{ old('uang') }}" autofocus required placeholder="Masukkan Jumlah Uang Pembinaan">
                @error('uang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe Kategori Juara</label>
                <select class="form-select @error('tipe') is-invalid @enderror" id="tipe" name="tipe" required>
                    <option value="" disabled selected>Pilih Tipe</option>
                    <option value="1UMUM" {{ old('tipe') === '1' ? 'selected' : '' }}>UMUM</option>
                    <option value="2UTAMA" {{ old('tipe') === '2' ? 'selected' : '' }}>UTAMA</option>
                    <option value="3VARFOR" {{ old('tipe') === '3' ? 'selected' : '' }}>VARFOR</option>
                    <option value="4PBB" {{ old('tipe') === '4' ? 'selected' : '' }}>PBB</option>
                    <option value="5DANTON" {{ old('tipe') === '4' ? 'selected' : '' }}>DANTON</option>
                    <option value="6BEST" {{ old('tipe') === '4' ? 'selected' : '' }}>LAINNYA</option>
                </select>
                @error('tipe')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="prioritas" class="form-label">Prioritas</label>
                <input type="number" min=0 class="form-control @error('prioritas') is-invalid @enderror" id="prioritas" name="prioritas" value="{{ old('prioritas') }}" autofocus required placeholder="Masukkan Urutan Juara">
                @error('prioritas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark mb-3">Save</button>
            <a href="{{ route('jenis.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection