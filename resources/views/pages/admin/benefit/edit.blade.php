@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('benefit.update', $benefits->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="tingkatan_id" class="form-label">Tingkatan yang Diikuti</label>
                <select class="form-select" name="tingkatan_id">
                    <option value="" disabled selected>Pilih Tingkatan</option>
                    @foreach ($tingkatans as $tingkatan)
                        @if (old('tingkatan_id', $benefits->tingkatan_id) == $tingkatan->id)
                            <option value="{{ $tingkatan->id }}" selected>{{ $tingkatan->nama_tingkatan }}</option>
                        @else
                            <option value="{{ $tingkatan->id }}">{{ $tingkatan->nama_tingkatan }}</option>
                        @endif
                    @endforeach
                </select>
                @error('tingkatan_id`')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama_juara" class="form-label">Nama Juara</label>
                <input type="text" id="nama_juara" name="nama_juara" class="form-control @error('nama_juara') is-invalid @enderror" value="{{ old('nama_juara', $benefits->nama_juara) }}" autofocus required placeholder="Masukkan Jenis Aba-Aba">
                @error('nama_juara')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="trophy" class="form-label">Jenis Trophy</label>
                <select id="trophy" name="trophy" class="form-select @error('trophy') is-invalid @enderror" required>
                    <option value="" disabled>Pilih Jenis Trophy</option>
                    @php
                    $options = [
                        'TROPHY BERGILIR',
                        'TROPHY TETAP',
                    ];
                    @endphp
                    @foreach ($options as $option)
                    <option value="{{ $option }}" {{ $option == $benefits->trophy ? 'selected' : '' }}>
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
                    <option value="" disabled>Pilih Jenis Trophy</option>
                    @php
                    $options = [
                        'SERTIFIKAT',
                        'TIDAK ADA',
                    ];
                    @endphp
                    @foreach ($options as $option)
                    <option value="{{ $option }}" {{ $option == $benefits->hadiah ? 'selected' : '' }}>
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
                <input type="number" min=0 class="form-control" id="uang" name="uang" value="{{ $benefits->uang }}">
                @error('uang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="prioritas" class="form-label">Prioritas</label>
                <input type="number" min=1 class="form-control" id="prioritas" name="prioritas" value="{{ $benefits->prioritas }}">
                @error('prioritas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark mb-3">Update</button>
            <a href="{{ route('benefit.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection