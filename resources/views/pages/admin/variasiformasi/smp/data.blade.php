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
                @if(auth()->user()->level === '3JURIVARFOR')
                <a href="{{ route('variasi-formasi-smp.create') }}" type="button" class="btn btn-dark mb-3">
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
                            @if ($nilaivarfors->count())
                            @foreach ($nilaivarfors as $nilaivarfor)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                @if(auth()->user()->level === '1ADMIN')
                                <td class="text-center">Peserta {{ $nilaivarfor->name }} No. Urut {{ $nilaivarfor->no_urut }}</td>
                                @elseif(auth()->user()->level === '3JURIVARFOR')
                                <td class="text-center">Peserta No. Urut {{ $nilaivarfor->no_urut }}</td>
                                @endif
                                <td class="text-center">
                                    <a href="{{ route('variasi-formasi-smp.show', $nilaivarfor->user_id) }}" class="badge bg-info">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    @if(auth()->user()->level === '1ADMIN')
                                    <form action="{{ route('variasi-formasi-smp.destroy', $nilaivarfor->id) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 btnDelete" data-object="Nilai dari Peserta No Urut {{ $nilaivarfor->no_urut }}">
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