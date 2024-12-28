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
        @if(auth()->user()->level == '1ADMIN')
        <div class="card mb-4 bg-secondary">
            <div class="card-body">
                <div class="mb-3">
                    <form action="{{ route('bayar.index') }}" method="GET" class="row align-items-end">
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
                            <input type="text" name="search" id="search" class="form-control" placeholder="Cari Nama Sekolah" value="{{ request('search') }}">
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
                                <th>Asal Sekolah</th>
                                <th style="width: 5%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($bayars->count())
                            @foreach ($bayars as $bayar)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bayar->name }}</td>
                                <td>
                                    <a href="{{ route('bayar.show', $bayar->user_id) }}" class="badge bg-info">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="3" class="text-danger text-center">
                                    <h4>Data tidak ditemukan</h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $bayars->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
        @elseif(auth()->user()->level == '4PESERTA')
        <div class="card mb-4 bg-secondary">
            <div class="card-body">
                <a href="{{ route('bayar.create') }}" type="button" class="btn btn-dark mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Pembayaran
                </a>
                <div class="mb-3">
                    <form action="{{ route('bayar.index') }}" method="GET" class="row align-items-end">
                        <div class="col-md-2">
                            <label for="perPage" class="form-label">Items per page</label>
                            <select name="perPage" id="perPage" class="form-select" onchange="this.form.submit()">
                                @foreach ($perPageOptions as $option)
                                    <option value="{{ $option }}" {{ $perPage == $option ? 'selected' : '' }}>{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Bukti Pembayaran</th>
                                <th style="width: 17%">Tanggal Dibuat</th>
                                <th style="width: 17%">Terakhir Diperbarui</th>
                                <th style="width: 8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($bayars->count())
                            @foreach ($bayars as $bayar)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($bayar->screenshot == "" || $bayar->screenshot == "-")
                                    <img src="{{ url('frontend/images/No Image Pleton.png') }}" alt="Gambar" style="width: 5cm;">
                                    @else
                                    <img src="{{ asset('storage/' . $bayar->screenshot) }}" alt="Gambar" style="width: 5cm;">
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($bayar->created_at)->translatedFormat('l, d F Y H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($bayar->updated_at)->translatedFormat('l, d F Y H:i') }}</td>
                                <td>
                                    <!-- <a href="{{ route('bayar.edit', $bayar->id) }}" class="badge bg-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a> -->
                                    <form action="{{ route('bayar.destroy', $bayar->id) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 btnDelete" data-object="Pembayaran dari {{ $bayar->user->name }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-danger text-center">
                                    <h4>Belum Ada Pembayaran yang Dibuat</h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $bayars->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
        @elseif(auth()->user()->level == '5CALONPESERTA')
        <div class="card mb-4 bg-secondary">
            <div class="card-body">
                <a href="{{ route('bayar.create') }}" type="button" class="btn btn-dark mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Pembayaran
                </a>
                <div class="mb-3">
                    <form action="{{ route('bayar.index') }}" method="GET" class="d-inline">
                        <label for="perPage" class="form-label">Items per page:</label>
                        <select name="perPage" id="perPage" class="form-select" onchange="this.form.submit()">
                            @foreach ($perPageOptions as $option)
                            <option value="{{ $option }}" {{ $perPage == $option ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Bukti Pembayaran</th>
                                <th style="width: 17%">Tanggal Dibuat</th>
                                <th style="width: 17%">Terakhir Diperbarui</th>
                                <th style="width: 8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($bayars->count())
                            @foreach ($bayars as $bayar)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($bayar->screenshot == "" || $bayar->screenshot == "-")
                                    <img src="{{ url('frontend/images/No Image Pleton.png') }}" alt="Gambar" style="width: 5cm;">
                                    @else
                                    <img src="{{ asset('storage/' . $bayar->screenshot) }}" alt="Gambar" style="width: 5cm;">
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($bayar->created_at)->translatedFormat('l, d F Y H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($bayar->updated_at)->translatedFormat('l, d F Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('bayar.edit', $bayar->id) }}" class="badge bg-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('bayar.destroy', $bayar->id) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 btnDelete" data-object="Pembayaran dari {{ $bayar->user->name }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-danger text-center">
                                    <h4>Belum Ada Pembayaran yang Dibuat</h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $bayars->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</main>
@endsection