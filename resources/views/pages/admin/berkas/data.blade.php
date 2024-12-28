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
                @if($berkases->count() === 0)
                <a href="{{ route('berkas.create') }}" type="button" class="btn btn-dark mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Berkas LKBB
                </a>
                @endif
                <!-- Data Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 29%">Link Poster</th>
                                <th style="width: 29%">Link Surat Rekomendasi</th>
                                <th style="width: 29%">Link Juknis</th>
                                <th style="width: 8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($berkases->count())
                            @foreach ($berkases as $berkas)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ $berkas->poster }}" target="_blank">Klik di Sini</a>
                                </td>
                                <td>
                                    <a href="{{ $berkas->rekom }}" target="_blank">Klik di Sini</a>
                                </td>
                                <td>
                                    <a href="{{ $berkas->juknis }}" target="_blank">Klik di Sini</a>
                                </td>
                                <td>
                                    <a href="{{ route('berkas.edit', $berkas->id) }}" class="badge bg-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('berkas.destroy', $berkas->id) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 btnDelete" data-object="Berkas LKBB">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-danger text-center">
                                        <h4>Belum Ada Data Berkas LKBB</h4>
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