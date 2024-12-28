@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('penilaian.index') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="abaaba_id" class="form-label">Nama Aba-Aba/Penilaian</label>
                <select class="form-select @error('abaaba_id') is-invalid @enderror" id="abaaba_id" name="abaaba_id" required>
                    <option value="" disabled selected>Pilih Aba-Aba</option>
                    @foreach ($abaabas as $abaaba)
                    @if (!in_array($abaaba->id, $cekIdPenilaians))
                    @if (old('abaaba_id') == $abaaba->id)
                    <option value="{{ $abaaba->id }}" selected>{{ $abaaba->nama_abaaba }}</option>
                    @else
                    <option value="{{ $abaaba->id }}">{{ $abaaba->nama_abaaba }}</option>
                    @endif
                    @endif
                    @endforeach
                </select>
                @error('abaaba_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="skala1" class="form-label">Skala 1</label>
                <input type="number" min=1 max=100 class="form-control @error('skala1') is-invalid @enderror" id="skala1" name="skala1" value="{{ old('skala1') }}" autofocus required placeholder="Masukkan Nilai Skala 1">
                @error('skala1')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="skala2" class="form-label">Skala 2</label>
                <input type="number" min=1 max=100 class="form-control @error('skala2') is-invalid @enderror" id="skala2" name="skala2" value="{{ old('skala2') }}" autofocus required placeholder="Masukkan Nilai Skala 2">
                @error('skala2')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="skala3" class="form-label">Skala 3</label>
                <input type="number" min=1 max=100 class="form-control @error('skala3') is-invalid @enderror" id="skala3" name="skala3" value="{{ old('skala3') }}" autofocus required placeholder="Masukkan Nilai Skala 3">
                @error('skala3')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="skala4" class="form-label">Skala 4</label>
                <input type="number" min=1 max=100 class="form-control @error('skala4') is-invalid @enderror" id="skala4" name="skala4" value="{{ old('skala4') }}" autofocus required placeholder="Masukkan Nilai Skala 4">
                @error('skala4')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="skala5" class="form-label">Skala 5</label>
                <input type="number" min=1 max=100 class="form-control @error('skala5') is-invalid @enderror" id="skala5" name="skala5" value="{{ old('skala5') }}" autofocus required placeholder="Masukkan Nilai Skala 5">
                @error('skala5')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="skala6" class="form-label">Skala 6</label>
                <input type="number" min=1 max=100 class="form-control @error('skala6') is-invalid @enderror" id="skala6" name="skala6" value="{{ old('skala6') }}" autofocus required placeholder="Masukkan Nilai Skala 6">
                @error('skala6')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="skala7" class="form-label">Skala 7</label>
                <input type="number" min=1 max=100 class="form-control @error('skala7') is-invalid @enderror" id="skala7" name="skala7" value="{{ old('skala7') }}" autofocus required placeholder="Masukkan Nilai Skala 7">
                @error('skala7')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark mb-3">Save</button>
            <a href="{{ route('penilaian.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection