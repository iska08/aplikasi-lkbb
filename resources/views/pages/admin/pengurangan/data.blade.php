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
                <a href="{{ route('pengurangan.create') }}" type="button" class="btn btn-dark mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Pengurangan Nilai
                </a>
                <div class="mb-3">
                    <form action="{{ route('pengurangan.index') }}" method="GET" class="row align-items-end">
                        <!-- Filter Items per page -->
                        <div class="col-md-2">
                            <label for="perPage" class="form-label">Items per page</label>
                            <select name="perPage" id="perPage" class="form-select" onchange="this.form.submit()">
                                @foreach ($perPageOptions as $option)
                                    <option value="{{ $option }}" {{ $perPage == $option ? 'selected' : '' }}>{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Filter Search -->
                        <div class="col-md-8">
                            <label for="search" class="form-label">Search</label>
                            <input type="text" name="search" id="search" class="form-control" placeholder="Cari Detail Pengurangan Nilai" value="{{ request('search') }}">
                        </div>
                        <!-- Submit Filter -->
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-dark w-100">Filter</button>
                        </div>
                    </form>
                </div>
                <!-- Data Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Keterangan Pengurangan Nilai</th>
                                <th>Minus</th>
                                <th style="width: 8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($pengurangans->count())
                                @foreach ($pengurangans as $pengurangan)
                                <tr>
                                    <td>{{ $loop->iteration + $pengurangans->firstItem() - 1 }}</td>
                                    <td>{{ Str::ucfirst($pengurangan->keterangan) }}</td>
                                    <td>{{ $pengurangan->poin }}/{{ $pengurangan->per }}</td>
                                    <td>
                                        <a href="{{ route('pengurangan.edit', $pengurangan->id) }}" class="badge bg-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('pengurangan.destroy', $pengurangan->id) }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0 btnDelete">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-danger text-center">
                                        <h4>Belum Ada Detail Pengurangan Nilai</h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    {{ $pengurangans->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection