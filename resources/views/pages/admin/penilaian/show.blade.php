@extends('layouts.admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="row align-items-center">
            <div class="col-sm-6 col-md-12">
                <h1 class="mt-4">{{ $title }}</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('penilaian.index') }}">Data Penilaian</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>x
            </div>
        </div>
        {{-- datatable --}}
        <div class="card mb-4 bg-secondary">
            <div class="card-body">
                @if(auth()->user()->level === '1ADMIN')
                <a href="{{ route('penilaian.create', ['tingkatan_id' => $tingkatan->id]) }}" type="button" class="btn btn-dark mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Penilaian
                </a>
                @endif
                @foreach($jenises as $jenis)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th rowspan="2" style="width: 5%">No</th>
                                <th rowspan="2">Nama Aba-Aba/Penilaian<br>({{ $jenis->jenis_name }})</th>
                                <th colspan="7">Kriteria Penilaian</th>
                                @if(auth()->user()->level === '1ADMIN')
                                <th rowspan="2" style="width: 8%">Aksi</th>
                                @endif
                            </tr>
                            <tr>
                                <th colspan="2" style="width: 14%">Kurang</th>
                                <th colspan="3" style="width: 21%">Cukup</th>
                                <th colspan="2" style="width: 14%">Baik</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $filteredPenilaians = $penilaians->where('jenis_id', $jenis->id);
                            @endphp
                            @if ($filteredPenilaians->count())
                            @foreach ($filteredPenilaians as $penilaian)
                            <tr>
                                <td class="text-center">{{ $penilaian->urutan_abaaba }}</td>
                                <td>{{ $penilaian->nama_abaaba }}</td>
                                <td class="text-center">{{ $penilaian->skala1 }}</td>
                                <td class="text-center">{{ $penilaian->skala2 }}</td>
                                <td class="text-center">{{ $penilaian->skala3 }}</td>
                                <td class="text-center">{{ $penilaian->skala4 }}</td>
                                <td class="text-center">{{ $penilaian->skala5 }}</td>
                                <td class="text-center">{{ $penilaian->skala6 }}</td>
                                <td class="text-center">{{ $penilaian->skala7 }}</td>
                                @if(auth()->user()->level === '1ADMIN')
                                <td class="text-center">
                                    <a href="{{ route('penilaian.edit', $penilaian->id) }}" class="badge bg-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('penilaian.destroy', $penilaian->id) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 btnDelete" data-object="Penilaian Aba-aba {{ $penilaian->nama_abaaba }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="10" class="text-danger text-center">
                                    <h4>Belum Ada Data Penilaian untuk {{ $jenis->jenis_name }}</h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <br>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection