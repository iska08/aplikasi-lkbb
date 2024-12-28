@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('bayar.update', $edBayar->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="screenshot" class="form-label">Bukti Pembayaran</label>
                <input type="file" class="form-control @error('screenshot') is-invalid @enderror" id="screenshot" name="screenshot" autofocus>
                @error('screenshot')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark mb-3">Simpan Perubahan</button>
            <a href="/dashboard/bayars" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection