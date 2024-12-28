@extends('layouts.admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="row align-items-center">
            <div class="col-sm-6 col-md-12">
                <h1 class="mt-4">{{ $title }}</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        {{-- datatable --}}
        <div class="card mb-4 bg-secondary">
            <div class="card-body">
                <a href="{{ route('peserta.create') }}" type="button" class="btn btn-dark mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Peserta
                </a>
                <div class="mb-3">
                    <form action="{{ route('peserta.index') }}" method="GET" class="row align-items-end">
                        <div class="col-md-2">
                            <label for="perPage" class="form-label">Items per page</label>
                            <select name="perPage" id="perPage" class="form-select" onchange="this.form.submit()">
                                @foreach ($perPageOptions as $option)
                                    <option value="{{ $option }}" {{ $perPage == $option ? 'selected' : '' }}>{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="search" class="form-label">Search</label>
                            <input type="text" name="search" id="search" class="form-control" placeholder="Cari Nama atau No Urut" value="{{ request('search') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="tingkatan" class="form-label">Filter Tingkatan</label>
                            <select name="tingkatan" id="tingkatan" class="form-select" onchange="this.form.submit()">
                                <option value="" {{ request('tingkatan') == '' ? 'selected' : '' }}>Semua Tingkatan</option>
                                @foreach ($tingkatans as $tingkatanOption)
                                    <option value="{{ $tingkatanOption->id }}" {{ request('tingkatan') == $tingkatanOption->id ? 'selected' : '' }}>
                                        {{ $tingkatanOption->nama_tingkatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-dark w-100">Filter</button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 15%">No Urut Pleton</th>
                                <th>Foto Pleton</th>
                                <th>Scan Surat Rekomendasi</th>
                                <th style="width: 15%">Asal Sekolah</th>
                                <th style="width: 15%">Tingkatan</th>
                                <th style="width: 10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pesertas->count())
                                @foreach ($pesertas as $peserta)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $peserta->no_urut }}</td>
                                    <td class="text-center">
                                        @if($peserta->foto_pleton == "" || $peserta->foto_pleton == "-")
                                        <img src="{{ url('frontend/images/No Image Pleton.png') }}" alt="Gambar" style="width: 5cm;">
                                        @else
                                        <img src="{{ asset('storage/' . $peserta->foto_pleton) }}" alt="Gambar" style="width: 5cm;">
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($peserta->rekomendasi == "" || $peserta->rekomendasi == "-")
                                        <img src="{{ url('frontend/images/No Image.png') }}" alt="Gambar" style="width: 5cm;">
                                        @else
                                        <img src="{{ asset('storage/' . $peserta->rekomendasi) }}" alt="Gambar" style="width: 5cm;">
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $peserta->user->name }}</td>
                                    <td class="text-center">{{ $peserta->nama_tingkatan }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('peserta.show', $peserta->user_id) }}" class="badge bg-info">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('peserta.edit', $peserta->id) }}" class="badge bg-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('peserta.destroy', $peserta->id) }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0 btnDelPeserta" data-object="{{ $peserta->user->name }}">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-danger text-center">
                                        <h4>Data tidak ditemukan</h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $pesertas->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection