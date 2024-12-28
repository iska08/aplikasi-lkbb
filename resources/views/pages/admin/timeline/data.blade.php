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
                @if($timelines->count() === 0)
                <a href="{{ route('timeline.create') }}" type="button" class="btn btn-dark mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Timeline LKBB
                </a>
                @endif
                <!-- Data Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Tanggal Pendaftaran Buka</th>
                                <th>Tanggal Pendaftaran Tutup</th>
                                <th>Lokasi Pendaftaran</th>
                                <th>Tanggal Technical Meeting</th>
                                <th>Lokasi Technical Meeting</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Lokasi Pelaksanaan</th>
                                <th style="width: 8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($timelines->count())
                            @foreach ($timelines as $timeline)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($timeline->tgl_pendaftaran_buka)->translatedFormat('d F Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($timeline->tgl_pendaftaran_tutup)->translatedFormat('d F Y') }}</td>
                                <td>{{ $timeline->lokasi_pendaftaran }}</td>
                                <td>{{ \Carbon\Carbon::parse($timeline->tgl_tm)->translatedFormat('d F Y') }}</td>
                                <td>{{ $timeline->lokasi_tm }}</td>
                                <td>{{ \Carbon\Carbon::parse($timeline->tgl_pelaksanaan)->translatedFormat('d F Y') }}</td>
                                <td>{{ $timeline->lokasi_pelaksanaan }}</td>
                                <td>
                                    <a href="{{ route('timeline.edit', $timeline->id) }}" class="badge bg-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('timeline.destroy', $timeline->id) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 btnDelete" data-object="Detail LKBB">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="9" class="text-danger text-center">
                                        <h4>Belum Ada Data Timeline LKBB</h4>
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