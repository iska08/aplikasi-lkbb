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
        {{-- datatable --}}
        <div class="card mb-4 bg-secondary">
            <div class="card-body">
                <a href="{{ route('benefit.create') }}" type="button" class="btn btn-dark mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Benefit
                </a>
                <div class="mb-3">
                    <form action="{{ route('benefit.index') }}" method="GET" class="row align-items-end">
                        <div class="col-md-2">
                            <label for="perPage" class="form-label">Items per page</label>
                            <select name="perPage" id="perPage" class="form-select" onchange="this.form.submit()">
                                @foreach ($perPageOptions as $option)
                                    <option value="{{ $option }}" {{ $perPage == $option ? 'selected' : '' }}>{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label for="search" class="form-label">Search</label>
                            <input type="text" name="search" id="search" class="form-control" placeholder="Cari Nama Juara/Trophy/Hadiah/Uang" value="{{ request('search') }}">
                        </div>
                        <div class="col-md-3">
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
                                <th>Nama Juara</th>
                                <th>Trophy</th>
                                <th>Hadiah</th>
                                <th>Uang Pembinaan</th>
                                <th>Tipe</th>
                                <th>Tingkatan Sekolah</th>
                                <th style="width: 8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($benefits->count())
                            @foreach ($benefits as $benefit)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $benefit->nama_juara }}</td>
                                <td>{{ $benefit->trophy }}</td>
                                <td>{{ $benefit->hadiah }}</td>
                                <td>Rp {{ number_format($benefit->uang, 0, ',', '.') }}</td>
                                <td>
                                    @if ($benefit->tipe == "1UMUM")
                                    UMUM
                                    @elseif ($benefit->tipe == "2UTAMA")
                                    UTAMA
                                    @elseif ($benefit->tipe == "3VARFOR")
                                    VARFOR
                                    @elseif ($benefit->tipe == "4PBB")
                                    PBB
                                    @elseif ($benefit->tipe == "5DANTON")
                                    DANTON
                                    @elseif ($benefit->tipe == "6BEST")
                                    LAINNYA
                                    @endif
                                </td>
                                <td>{{ $benefit->nama_tingkatan }}</td>
                                <td>
                                    <a href="{{ route('benefit.edit', $benefit->id) }}" class="badge bg-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('benefit.destroy', $benefit->id) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 btnDelete" data-object="{{ $benefit->nama_juara }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="8" class="text-danger text-center">
                                    <h4>Belum Ada Data Benefit yang Dibuat</h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $benefits->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection