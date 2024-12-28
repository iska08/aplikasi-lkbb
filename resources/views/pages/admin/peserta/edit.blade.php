@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('peserta.update', $edPeserta->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">Asal Sekolah</label>
                <select class="form-select" name="user_id" readonly disabled>
                    <option value="" disabled selected>Pilih Asal Sekolah</option>
                    @foreach ($pesertaLunas as $lunas)
                        @if (old('user_id', $edPeserta->user_id) == $lunas->id)
                            <option value="{{ $lunas->id }}" selected>{{ $lunas->name }}</option>
                        @else
                            <option value="{{ $lunas->id }}">{{ $lunas->name }}</option>
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
                <input type="number" min=1 max=50 class="form-control" id="no_urut" name="no_urut" value="{{ $edPeserta->no_urut }}">
            </div>
            <div class="mb-3">
                <label for="tingkatan_id" class="form-label">Tingkatan yang Diikuti</label>
                <select class="form-select" name="tingkatan_id">
                    <option value="" disabled selected>Pilih Tingkatan</option>
                    @foreach ($tingkatans as $tingkatan)
                        @if (old('tingkatan_id', $edPeserta->tingkatan_id) == $tingkatan->id)
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
            <button type="submit" class="btn btn-dark mb-3">Simpan Perubahan</button>
            <a href="/dashboard/pesertas" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection