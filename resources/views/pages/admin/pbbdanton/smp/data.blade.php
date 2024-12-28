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
                @if(auth()->user()->level === '2JURIPBB')
                <a href="{{ route('pbb-danton-smp.create') }}" type="button" class="btn btn-dark mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Form Nilai
                </a>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>No Urut Pleton</th>
                                @if(auth()->user()->level === '1ADMIN')
                                <th style="width: 10%">Aksi</th>
                                @else
                                <th style="width: 10%">Detail Nilai</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if ($nilaipbbdantons->count())
                            @foreach ($nilaipbbdantons as $nilaipbbdanton)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                @if(auth()->user()->level === '1ADMIN')
                                <td class="text-center">Peserta {{ $nilaipbbdanton->name }} No. Urut {{ $nilaipbbdanton->no_urut }}</td>
                                @elseif(auth()->user()->level === '2JURIPBB')
                                <td class="text-center">Peserta No. Urut {{ $nilaipbbdanton->no_urut }}</td>
                                @endif
                                <td class="text-center">
                                    <a href="{{ route('pbb-danton-smp.show', $nilaipbbdanton->user_id) }}" class="badge bg-info">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    @if(auth()->user()->level === '1ADMIN')
                                    <form action="{{ route('pbb-danton-smp.destroy', $nilaipbbdanton->id) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 btnDelete" data-object="Nilai dari Peserta No Urut {{ $nilaipbbdanton->no_urut }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-danger text-center">
                                    <h4>Belum Ada Form Nilai yang Dibuat</h4>
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