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
        <div class="card mb-4 bg-secondary">
            <div class="card-body">
                <a href="{{ route('user.create') }}" type="button" class="btn btn-dark mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Pengguna
                </a>
                <div class="mb-3">
                    <form action="{{ route('user.index') }}" method="GET" class="row align-items-end">
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
                            <input type="text" name="search" id="search" class="form-control" placeholder="Cari Nama/Username/Email" value="{{ request('search') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="level" class="form-label">Filter Level</label>
                            <select name="level" id="level" class="form-select" onchange="this.form.submit()">
                                <option value="" {{ request('level') == '' ? 'selected' : '' }}>Semua Level</option>
                                @foreach ($levelOptions as $key => $value)
                                    <option value="{{ $key }}" {{ request('level') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-dark w-100">Filter</button>
                        </div>
                    </form>
                </div>
                <div class="mb-3 table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark text-white align-middle text-center">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Nama</th>
                                <th style="width: 20%">Username</th>
                                <th style="width: 20%">Email</th>
                                <th style="width: 15%">Level</th>
                                <th style="width: 8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php $number = ($users->currentPage() - 1) * $users->perPage() + 1; @endphp
                            @forelse ($users as $user)
                            <tr>
                                <td>{{ $number++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->level === '1ADMIN') ADMIN
                                    @elseif($user->level === '2JURIPBB') JURI PBB
                                    @elseif($user->level === '3JURIVARFOR') JURI VARFOR
                                    @elseif($user->level === '4PESERTA') PESERTA
                                    @elseif($user->level === '5CALONPESERTA') CALON PESERTA
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="badge bg-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 btnDelete" data-object="Pengguna {{ $user->name }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-danger text-center p-4">
                                    <h4>Belum Ada Data Pengguna</h4>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $users->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection