@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('detail.index') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="cakupan" class="form-label">Cakupan LKBB</label>
                <input type="text" id="cakupan" name="cakupan" class="form-control @error('cakupan') is-invalid @enderror" value="{{ old('cakupan') }}" autofocus required placeholder="Masukkan Cakupan LKBB">
                @error('cakupan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Penyelenggara</label>
                <input type="text" id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" autofocus required placeholder="Masukkan Alamat Penyelenggara">
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="maps" class="form-label">Link Google Maps</label>
                <input type="text" id="maps" name="maps" class="form-control @error('maps') is-invalid @enderror" value="{{ old('maps') }}" autofocus required placeholder="Masukkan Link Google Maps">
                @error('maps')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="keterangan_lkbb" class="form-label">Keterangan LKBB</label>
                <textarea type="text" id="keterangan_lkbb" name="keterangan_lkbb" class="form-control @error('keterangan_lkbb') is-invalid @enderror" value="{{ old('keterangan_lkbb') }}" autofocus required placeholder="Masukkan Keterangan"></textarea>
                @error('keterangan_lkbb')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="total_pembinaan" class="form-label">Total Uang Pembinaan</label>
                <input type="number" min=1 class="form-control @error('total_pembinaan') is-invalid @enderror" id="total_pembinaan" name="total_pembinaan" value="{{ old('total_pembinaan') }}" autofocus required placeholder="Masukkan Total Uang Pembinaan">
                @error('total_pembinaan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="htm" class="form-label">HTM</label>
                <input type="number" min=1 class="form-control @error('htm') is-invalid @enderror" id="htm" name="htm" value="{{ old('htm') }}" autofocus required placeholder="Masukkan HTM">
                @error('htm')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark mb-3">Save</button>
            <a href="{{ route('detail.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection