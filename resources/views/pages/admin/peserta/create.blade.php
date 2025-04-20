@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('peserta.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">Asal Sekolah</label>
                <select class="form-select simple-select2 @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                    <option value="" disabled selected></option>
                    @foreach ($pesertaLunas as $lunas)
                        @if (!in_array($lunas->id, $selectedUserIds))
                            @if (old('user_id') == $lunas->id)
                                <option value="{{ $lunas->id }}" selected>{{ $lunas->name }}</option>
                            @else
                                <option value="{{ $lunas->id }}">{{ $lunas->name }}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
                @error('user_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_urut" class="form-label">No Urut</label>
                <input type="number" min=0 max=50 class="form-control @error('no_urut') is-invalid @enderror" id="no_urut" name="no_urut" value="{{ old('no_urut') }}" autofocus required placeholder="Masukkan No Urut Peserta">
                @error('no_urut')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
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
            <input type="hidden" name="status" value="AKTIF">
            <button type="submit" class="btn btn-dark mb-3">Simpan</button>
            <a href="{{ route('peserta.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection