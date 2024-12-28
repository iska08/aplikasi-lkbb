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
        {{-- Kondisi untuk menampilkan pesan jika sekolah belum terdaftar --}}
        @if (!$cekPeserta)
        <div class="alert alert-warning text-center bg-secondary">
            <h4>Sekolah Anda Belum Terdaftar!</h4>
        </div>
        @else
        {{-- Tabel Data Pleton --}}
        <div class="card mb-4 bg-secondary">
            <div class="card-body">
                <a href="{{ route('pleton.create') }}" type="button" class="btn btn-dark mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Anggota Pleton
                </a>
                <div class="mb-3">
                    <form action="{{ route('pleton.index') }}" method="GET" class="d-inline">
                        <label for="perPage" class="form-label">Items per page:</label>
                        <select name="perPage" id="perPage" class="form-select" onchange="this.form.submit()">
                            @foreach ($perPageOptions as $option)
                            <option value="{{ $option }}" {{ $perPage == $option ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                {{-- Tabel responsive --}}
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 4cm">Foto</th>
                                <th>Nama</th>
                                <th style="width: 10%">Kelas</th>
                                <th style="width: 10%">NIS</th>
                                <th style="width: 10%">Posisi</th>
                                <th style="width: 8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pletons->count())
                            @foreach ($pletons as $pleton)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    @if($pleton->foto_anggota == "" || $pleton->foto_anggota == "-")
                                    <img src="{{ url('frontend/images/Contoh Foto Pleton.jpg') }}" alt="Gambar" style="width: 3cm;">
                                    @else
                                    <img src="{{ asset('storage/' . $pleton->foto_anggota) }}" alt="Gambar" style="width: 3cm;">
                                    @endif
                                </td>
                                <td class="text-center">{{ $pleton->nama_anggota }}</td>
                                <td class="text-center">{{ $pleton->kelas_anggota }}</td>
                                <td class="text-center">{{ $pleton->nis_anggota }}</td>
                                <td class="text-center">{{ $pleton->nama_posisi }}</td>
                                <td class="text-center">
                                    <a href="{{ route('pleton.edit', $pleton->pleton_id) }}" class="badge bg-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('pleton.destroy', $pleton->pleton_id) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 btnDelete" data-object="{{ $pleton->nama_anggota }} dari Pleton">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="7" class="text-danger text-center">
                                    <h4>Belum Ada Anggota Pleton yang Dibuat</h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $pletons->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</main>
@endsection