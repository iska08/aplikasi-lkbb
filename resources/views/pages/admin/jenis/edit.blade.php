@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('jenis.update', $jenises->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="tingkatan_id" class="form-label">Tingkatan yang Diikuti</label>
                <select class="form-select" name="tingkatan_id">
                    <option value="" disabled selected>Pilih Tingkatan</option>
                    @foreach ($tingkatans as $tingkatan)
                        @if (old('tingkatan_id', $jenises->tingkatan_id) == $tingkatan->id)
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
                <label for="jenis_name" class="form-label">Nama Jenis Wisata</label>
                <input type="text" id="jenis_name" name="jenis_name" class="form-control @error('jenis_name') is-invalid @enderror" value="{{ old('jenis_name', $jenises->jenis_name) }}" autofocus required placeholder="Masukkan Jenis Aba-Aba">
                @error('jenis_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="urutan" class="form-label">Urutan</label>
                <input type="number" min=1 class="form-control" id="urutan" name="urutan" value="{{ $jenises->urutan }}">
            </div>
            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe Jenis Aba-Aba</label>
                <select class="form-select @error('tipe') is-invalid @enderror" id="tipe" name="tipe" required>
                    <option value="" disabled selected>Pilih Tipe Jenis Aba-Aba</option>
                    <option value="1PBB" {{ old('tipe', $jenises->tipe) === '1PBB' ? 'selected' : '' }}>PBB</option>
                    <option value="2DANTON" {{ old('tipe', $jenises->tipe) === '2DANTON' ? 'selected' : '' }}>DANTON</option>
                    <option value="3VARIASI" {{ old('tipe', $jenises->tipe) === '3VARIASI' ? 'selected' : '' }}>VARIASI</option>
                    <option value="4FORMASI" {{ old('tipe', $jenises->tipe) === '4FORMASI' ? 'selected' : '' }}>FORMASI</option>
                </select>
                @error('tipe')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark mb-3">Update</button>
            <a href="{{ route('jenis.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection