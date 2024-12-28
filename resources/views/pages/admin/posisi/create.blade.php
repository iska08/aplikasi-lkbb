@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('posisi.index') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_posisi" class="form-label">Nama Posisi</label>
                <input type="text" id="nama_posisi" name="nama_posisi" class="form-control @error('nama_posisi') is-invalid @enderror" value="{{ old('nama_posisi') }}" autofocus required placeholder="Masukkan Posisi">
                @error('nama_posisi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea id="keterangan" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" autofocus required placeholder="Masukkan Keterangan">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark mb-3">Save</button>
            <a href="{{ route('posisi.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection