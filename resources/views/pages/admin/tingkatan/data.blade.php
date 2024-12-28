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
                <a href="{{ route('tingkatan.create') }}" type="button" class="btn btn-dark mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Tingkatan
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Nama Tingkatan</th>
                                <th>Slug</th>
                                <th style="width: 8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($tingkatans->count())
                            @foreach ($tingkatans as $tingkatan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ Str::ucfirst($tingkatan->nama_tingkatan) }}</td>
                                <td>{{ $tingkatan->slug }}</td>
                                <td>
                                    <a href="{{ route('tingkatan.edit', $tingkatan->id) }}" class="badge bg-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('tingkatan.destroy', $tingkatan->id) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 btnDelete" data-object="Tingkatan {{ $tingkatan->nama_tingkatan }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="3" class="text-danger text-center">
                                    <h4>Belum Ada Data Tingkatan</h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection