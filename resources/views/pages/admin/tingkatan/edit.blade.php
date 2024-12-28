@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('tingkatan.update', $tingkatans->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_tingkatan" class="form-label">Nama Tingkatan</label>
                <select id="nama_tingkatan" name="nama_tingkatan" class="form-select @error('nama_tingkatan') is-invalid @enderror" required>
                    <option value="" disabled>Pilih Tingkatan</option>
                    @php
                        $options = [
                            'SD/MI Sederajat',
                            'SMP/MTs Sederajat',
                            'SMA/SMK/MA Sederajat',
                            'Purna/Manajemen',
                        ];
                    @endphp
                    @foreach ($options as $option)
                        @if (!in_array($option, $existingTingkatans) || $option == $tingkatans->nama_tingkatan)
                            <option value="{{ $option }}" {{ $option == $tingkatans->nama_tingkatan ? 'selected' : '' }}>
                                {{ $option }}
                            </option>
                        @endif
                    @endforeach
                </select>
                @error('nama_tingkatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark mb-3">Update</button>
            <a href="{{ route('tingkatan.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection