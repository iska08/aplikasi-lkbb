@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="row align-items-center">
        <div class="col-sm-6 col-md-12">
            <h1 class="mt-4">{{ $title }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </div>
    </div>
    <div class="card bg-secondary">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 border-end pe-4">
                    <h4 class="mb-3 text-white text-center">Preview File</h4>
                    <table style="border-collapse: collapse; border: none;">
                        <tr class="text-center">
                            <td>
                                <label for="foto_pleton" class="form-label text-white">Foto Pleton</label>
                            </td>
                            <td></td>
                            <td>
                                <label for="rekomendasi" class="form-label text-white">Scan Surat Rekomendasi</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 49%;">
                                @if ($fotos && $fotos->foto_pleton)
                                    <img src="{{ asset('storage/' . $fotos->foto_pleton) }}" alt="Foto Pleton" class="img-thumbnail mb-3" style="max-width: 100%; height: auto;">
                                @else
                                    <p class="text-warning">Foto Pleton belum diunggah.</p>
                                @endif
                            </td>
                            <td></td>
                            <td style="width: 49%;">
                                @if ($fotos && $fotos->rekomendasi)
                                    <img src="{{ asset('storage/' . $fotos->rekomendasi) }}" alt="Scan Rekomendasi" class="img-thumbnail mb-3" style="max-width: 100%; height: auto;">
                                @else
                                    <p class="text-warning">Scan Rekomendasi belum diunggah.</p>
                                @endif
                            </td>
                        </tr>
                    </table>
                    <!-- <div class="d-flex justify-content-between align-items-start w-100">
                        <div class="text-center me-3">
                            <label for="foto_pleton" class="form-label text-white">Foto Pleton</label>
                            <br>
                            @if ($fotos && $fotos->foto_pleton)
                                <img src="{{ asset('storage/' . $fotos->foto_pleton) }}" alt="Foto Pleton" class="img-thumbnail mb-3" style="max-width: 100%; height: auto;">
                            @else
                                <p class="text-warning">Foto Pleton belum diunggah.</p>
                            @endif
                        </div>
                        <div class="text-center ms-3">
                            <label for="rekomendasi" class="form-label text-white">Scan Surat Rekomendasi</label>
                            <br>
                            @if ($fotos && $fotos->rekomendasi)
                                <img src="{{ asset('storage/' . $fotos->rekomendasi) }}" alt="Scan Rekomendasi" class="img-thumbnail mb-3" style="max-width: 100%; height: auto;">
                            @else
                                <p class="text-warning">Scan Rekomendasi belum diunggah.</p>
                            @endif
                        </div>
                    </div> -->
                </div>
                <div class="col-lg-8 ps-4">
                    {{-- Cek jika status peserta adalah "BATAL" --}}
                    @if ($fotos && $fotos->status === 'BATAL')
                        <div class="alert alert-danger text-center">
                            <strong>Akses Ditolak!</strong> Peserta dengan status <b>"BATAL"</b> tidak dapat mengubah data.
                        </div>
                    @endif
                    <form method="POST" action="{{ route('foto.update', $fotos ? $fotos->id : '') }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <h4 class="mb-3 text-white">Pengaturan Informasi Pleton</h4>
                        <div class="mb-3">
                            <label for="foto_pleton" class="form-label">Foto Pleton</label>
                            <input type="file" class="form-control @error('foto_pleton') is-invalid @enderror" id="foto_pleton" name="foto_pleton" 
                                {{ ($fotos && $fotos->status === 'BATAL') ? 'disabled' : '' }}>
                            @error('foto_pleton')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="rekomendasi" class="form-label">Scan Surat Rekomendasi</label>
                            <input type="file" class="form-control @error('rekomendasi') is-invalid @enderror" id="rekomendasi" name="rekomendasi" 
                                {{ ($fotos && $fotos->status === 'BATAL') ? 'disabled' : '' }}>
                            @error('rekomendasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark mb-3 mt-1" 
                            {{ ($fotos && $fotos->status === 'BATAL') ? 'disabled' : '' }}>
                            Simpan Perubahan Informasi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
