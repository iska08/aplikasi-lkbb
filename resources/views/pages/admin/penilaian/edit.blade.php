@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('penilaian.update', $penilaian->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="skala1" class="form-label">Skala 1</label>
                <input type="number" min=1 max=100 class="form-control" id="skala1" name="skala1" value="{{ $penilaian->skala1 }}">
            </div>
            <div class="mb-3">
                <label for="skala2" class="form-label">Skala 2</label>
                <input type="number" min=1 max=100 class="form-control" id="skala2" name="skala2" value="{{ $penilaian->skala2 }}">
            </div>
            <div class="mb-3">
                <label for="skala3" class="form-label">Skala 3</label>
                <input type="number" min=1 max=100 class="form-control" id="skala3" name="skala3" value="{{ $penilaian->skala3 }}">
            </div>
            <div class="mb-3">
                <label for="skala4" class="form-label">Skala 4</label>
                <input type="number" min=1 max=100 class="form-control" id="skala4" name="skala4" value="{{ $penilaian->skala4 }}">
            </div>
            <div class="mb-3">
                <label for="skala5" class="form-label">Skala 5</label>
                <input type="number" min=1 max=100 class="form-control" id="skala5" name="skala5" value="{{ $penilaian->skala5 }}">
            </div>
            <div class="mb-3">
                <label for="skala6" class="form-label">Skala 6</label>
                <input type="number" min=1 max=100 class="form-control" id="skala6" name="skala6" value="{{ $penilaian->skala6 }}">
            </div>
            <div class="mb-3">
                <label for="skala7" class="form-label">Skala 7</label>
                <input type="number" min=1 max=100 class="form-control" id="skala7" name="skala7" value="{{ $penilaian->skala7 }}">
            </div>
            <input type="hidden" name="abaaba_id" value="{{ $penilaian->abaaba_id }}">
            <button type="submit" class="btn btn-dark mb-3">Update</button>
            <a href="{{ route('penilaian.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection