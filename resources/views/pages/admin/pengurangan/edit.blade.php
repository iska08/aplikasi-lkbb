@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('pengurangan.update', $pengurangans->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="keterangan" class="form-label">Pengurangan Nilai</label>
                <input type="text" id="keterangan" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan', $pengurangans->keterangan) }}" autofocus required placeholder="Masukkan Nama CP">
                @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="per" class="form-label">Per</label>
                <input type="text" id="per" name="per" class="form-control @error('per') is-invalid @enderror" value="{{ old('per', $pengurangans->per) }}" autofocus required placeholder="Masukkan Nama CP">
                @error('per')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="poin" class="form-label">Minus Poin</label>
                <input type="number" min=1 class="form-control @error('poin') is-invalid @enderror" id="poin" name="poin" value="{{ old('poin', $pengurangans->poin) }}" autofocus required>
                @error('poin')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark mb-3">Update</button>
            <a href="{{ route('pengurangan.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection