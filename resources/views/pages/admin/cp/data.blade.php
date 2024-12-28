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
                <a href="{{ route('cp.create') }}" type="button" class="btn btn-dark mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Tambah CP
                </a>
                <div class="mb-3">
                    <form action="{{ route('cp.index') }}" method="GET" class="row align-items-end">
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
                        <div class="col-md-4">
                            <label for="search" class="form-label">Search</label>
                            <input type="text" name="search" id="search" class="form-control" placeholder="Cari Nama CP atau No HP" value="{{ request('search') }}">
                        </div>
                        <!-- Filter Peran -->
                        <div class="col-md-4">
                            <label for="peran" class="form-label">Filter Peran</label>
                            <select name="peran" id="peran" class="form-select" onchange="this.form.submit()">
                                <option value="" {{ request('peran') == '' ? 'selected' : '' }}>Semua Peran</option>
                                @foreach ($perans as $peranOption)
                                    <option value="{{ $peranOption->peran }}" {{ request('peran') == $peranOption->peran ? 'selected' : '' }}>
                                        {{ $peranOption->peran }}
                                    </option>
                                @endforeach
                            </select>
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
                                <th>Nama CP</th>
                                <th>No Hp</th>
                                <th>Peran</th>
                                <th style="width: 8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($cps->count())
                                @foreach ($cps as $cp)
                                <tr>
                                    <td>{{ $loop->iteration + $cps->firstItem() - 1 }}</td>
                                    <td>{{ Str::ucfirst($cp->nama_cp) }}</td>
                                    <td>{{ $cp->noHp }}</td>
                                    <td>{{ $cp->peran }}</td>
                                    <td>
                                        <a href="{{ route('cp.edit', $cp->id) }}" class="badge bg-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('cp.destroy', $cp->id) }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0 btnDelete" data-object="CP: {{ $cp->nama_cp }}">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-danger text-center">
                                        <h4>Belum Ada Data CP</h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    {{ $cps->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection