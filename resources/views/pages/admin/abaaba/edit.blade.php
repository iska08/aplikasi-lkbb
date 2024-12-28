@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('aba-aba.update', $abaaba->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nama_abaaba" class="form-label">Nama Aba-Aba/Penilaian</label>
                <input type="text" class="form-control @error('nama_abaaba') is-invalid @enderror" id="nama_abaaba" name="nama_abaaba" value="{{ old('nama_abaaba', $abaaba->nama_abaaba) }}" autofocus required>
                @error('nama_abaaba')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="urutan_abaaba" class="form-label">Urutan Aba-Aba</label>
                <input type="number" min=1 class="form-control @error('urutan_abaaba') is-invalid @enderror" id="urutan_abaaba" name="urutan_abaaba" value="{{ old('urutan_abaaba', $abaaba->urutan_abaaba) }}" autofocus required>
                @error('urutan_abaaba')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jenis_id" class="form-label">Jenis Aba-Aba</label>
                <select class="form-select" name="jenis_id">
                    <option value="" disabled selected>Pilih Jenis Aba-Aba</option>
                    @foreach ($jenises as $jenis)
                        @if (old('jenis_id', $abaaba->jenis_id) == $jenis->id)
                            <option value="{{ $jenis->id }}" selected>{{ $jenis->jenis_name }}</option>
                        @else
                            <option value="{{ $jenis->id }}">{{ $jenis->jenis_name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('jenis_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
           <button type="submit" class="btn btn-dark mb-3">Simpan Perubahan</button>
            <a href="{{ route('aba-aba.index') }}" class="btn btn-danger mb-3">Batal</a>
        </form>
    </div>
</div>
@endsection