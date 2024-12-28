@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('sosmed.index') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                    value="{{ old('email') }}" autofocus required placeholder="Masukkan Email">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="facebook" class="form-label">Link Facebook</label>
                <input type="url" id="facebook" name="facebook" class="form-control @error('facebook') is-invalid @enderror" 
                    value="{{ old('facebook') }}" autofocus placeholder="Masukkan Link Facebook">
                @error('facebook')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="instagram" class="form-label">Link Instagram</label>
                <input type="url" id="instagram" name="instagram" class="form-control @error('instagram') is-invalid @enderror" 
                    value="{{ old('instagram') }}" autofocus placeholder="Masukkan Link Instagram">
                @error('instagram')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tiktok" class="form-label">Link TikTok</label>
                <input type="url" id="tiktok" name="tiktok" class="form-control @error('tiktok') is-invalid @enderror" 
                    value="{{ old('tiktok') }}" autofocus placeholder="Masukkan Link TikTok">
                @error('tiktok')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="twitter" class="form-label">Link X/Twitter</label>
                <input type="url" id="twitter" name="twitter" class="form-control @error('twitter') is-invalid @enderror" 
                    value="{{ old('twitter') }}" autofocus placeholder="Masukkan Link X/Twitter">
                @error('twitter')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="youtube" class="form-label">Link YouTube</label>
                <input type="url" id="youtube" name="youtube" class="form-control @error('youtube') is-invalid @enderror" 
                    value="{{ old('youtube') }}" autofocus placeholder="Masukkan Link YouTube">
                @error('youtube')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark mb-3">Save</button>
            <a href="{{ route('sosmed.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection