@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('jenis.index') }}" enctype="multipart/form-data">
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
                <label for="jenis_name" class="form-label">Nama Jenis Aba-Aba</label>
                <input type="text" id="jenis_name" name="jenis_name" class="form-control @error('jenis_name') is-invalid @enderror" value="{{ old('jenis_name') }}" autofocus required placeholder="Masukkan Jenis Aba-Aba">
                @error('jenis_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="urutan" class="form-label">Urutan</label>
                <input type="number" min=1 class="form-control @error('urutan') is-invalid @enderror" id="urutan" name="urutan" value="{{ old('urutan') }}" autofocus required placeholder="Masukkan Urutan Aba-Aba">
                @error('urutan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe Jenis Aba-Aba</label>
                <select class="form-select @error('tipe') is-invalid @enderror" id="tipe" name="tipe" required>
                    <option value="" disabled selected>Pilih Tipe Jenis Aba-Aba</option>
                    <option value="1PBB" {{ old('tipe') === '1' ? 'selected' : '' }}>PBB</option>
                    <option value="2DANTON" {{ old('tipe') === '2' ? 'selected' : '' }}>DANTON</option>
                    <option value="3VARIASI" {{ old('tipe') === '3' ? 'selected' : '' }}>VARIASI</option>
                    <option value="4FORMASI" {{ old('tipe') === '4' ? 'selected' : '' }}>FORMASI</option>
                </select>
                @error('tipe')
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