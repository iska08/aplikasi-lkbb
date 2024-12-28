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
                <a href="{{ route('jenis.create') }}" type="button" class="btn btn-dark mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Jenis Aba-Aba
                </a>
                <div class="mb-3">
                    <form action="{{ route('jenis.index') }}" method="GET" class="row align-items-end">
                        <div class="col-md-2">
                            <label for="perPage" class="form-label">Items per page</label>
                            <select name="perPage" id="perPage" class="form-select" onchange="this.form.submit()">
                                @foreach ($perPageOptions as $option)
                                    <option value="{{ $option }}" {{ $perPage == $option ? 'selected' : '' }}>{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="search" class="form-label">Search</label>
                            <input type="text" name="search" id="search" class="form-control" placeholder="Cari Nama atau No Urut" value="{{ request('search') }}">
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
                            <label for="tipe" class="form-label">Filter Tipe</label>
                            <select name="tipe" id="tipe" class="form-select" onchange="this.form.submit()">
                                <option value="" {{ request('tipe') == '' ? 'selected' : '' }}>Semua Tipe</option>
                                @foreach ($tipeOptions as $key => $value)
                                    <option value="{{ $key }}" {{ request('tipe') == $key ? 'selected' : '' }}>{{ $value }}</option>
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
                                <th>Jenis Aba-Aba</th>
                                <th>Tingkatan Sekolah</th>
                                <th style="width: 20%">Urutan Jenis Aba-Aba</th>
                                <th style="width: 17%">Tipe Jenis Aba-Aba</th>
                                <th style="width: 10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($jenises->count())
                            @foreach ($jenises as $jenis)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jenis->jenis_name }}</td>
                                <td>{{ $jenis->nama_tingkatan }}</td>
                                <td>{{ $jenis->urutan }}</td>
                                <td>
                                    @if($jenis->tipe === '1PBB')
                                    PBB
                                    @elseif($jenis->tipe === '2DANTON')
                                    DANTON
                                    @elseif($jenis->tipe === '3VARIASI')
                                    VARIASI
                                    @elseif($jenis->tipe === '4FORMASI')
                                    FORMASI
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('jenis.show', $jenis->id) }}" class="badge bg-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('jenis.edit', $jenis->id) }}" class="badge bg-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('jenis.destroy', $jenis->id) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 btnDelJenis" data-object="{{ $jenis->jenis_name }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6" class="text-danger text-center">
                                    <h4>Belum Ada Jenis Aba-Aba yang Dibuat</h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $jenises->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection