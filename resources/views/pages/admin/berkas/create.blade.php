@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('berkas.index') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="poster" class="form-label">Link Poster</label>
                <input type="url" id="poster" name="poster" class="form-control @error('poster') is-invalid @enderror" value="{{ old('poster') }}" autofocus required placeholder="Masukkan Link Poster">
                @error('poster')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="rekom" class="form-label">Link Surat Rekomendasi</label>
                <input type="url" id="rekom" name="rekom" class="form-control @error('rekom') is-invalid @enderror" value="{{ old('rekom') }}" autofocus required placeholder="Masukkan Link Surat Rekomendasi">
                @error('rekom')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="juknis" class="form-label">Link Juknis</label>
                <input type="url" id="juknis" name="juknis" class="form-control @error('juknis') is-invalid @enderror" value="{{ old('juknis') }}" autofocus required placeholder="Masukkan Link Juknis">
                @error('juknis')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark mb-3">Save</button>
            <a href="{{ route('berkas.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection