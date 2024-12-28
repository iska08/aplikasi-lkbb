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
                <a href="{{ route('posisi.create') }}" type="button" class="btn btn-dark mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Posisi
                </a>
                <div class="mb-3">
                    <form action="{{ route('posisi.index') }}" method="GET" class="row align-items-end">
                        <div class="col-md-3">
                            <label for="perPage" class="form-label">Items per page:</label>
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
                                <th style="width: 15%">Nama Posisi</th>
                                <th>Keterangan</th>
                                <th style="width: 8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($posisis->count())
                            @foreach ($posisis as $posisi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ Str::ucfirst($posisi->nama_posisi) }}
                                </td>
                                <td>
                                    @if ($posisi->keterangan == "" || $posisi->keterangan == "-")
                                    -
                                    @else
                                    {{ $posisi->keterangan }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('posisi.edit', $posisi->id) }}" class="badge bg-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('posisi.destroy', $posisi->id) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 btnDelete" data-object="Posisi {{ $posisi->nama_posisi }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" class="text-danger text-center">
                                    <h4>Belum Ada Data Posisi</h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $posisis->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection