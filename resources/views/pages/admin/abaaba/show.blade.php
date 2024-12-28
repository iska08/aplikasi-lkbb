@extends('layouts.admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="row align-items-center">
            <div class="col-sm-6 col-md-12">
                <h1 class="mt-4">{{ $title }}</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('aba-aba.index') }}">Data Aba-aba</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        {{-- datatable --}}
        <div class="card mb-4 bg-secondary">
            <div class="card-body">
                <a href="{{ route('aba-aba.create', ['tingkatan_id' => $tingkatan->id]) }}" type="button" class="btn btn-dark mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Aba-Aba
                </a>
                @foreach($jenises as $jenis)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th colspan="3" class="fw-bold bg-dark">{{ $jenis->jenis_name }}</th>
                            </tr>
                            <tr>
                                <th style="width: 8%">No</th>
                                <th>Nama Aba-Aba/Penilaian</th>
                                <th style="width: 8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $filteredAbaabas = $abaabas->where('jenis_id', $jenis->id);
                            @endphp
                            @if ($filteredAbaabas->count())
                            @foreach ($filteredAbaabas as $abaaba)
                            <tr>
                                <td class="text-center">{{ $abaaba->urutan_abaaba }}</td>
                                <td>{{ $abaaba->nama_abaaba }}</td>
                                <td class="text-center">
                                    <a href="{{ route('aba-aba.edit', $abaaba->id) }}" class="badge bg-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('aba-aba.destroy', $abaaba->id) }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="badge bg-danger border-0 btnDelete" data-object="Aba-Aba {{ $abaaba->nama_abaaba }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="3" class="text-danger text-center">
                                    <h4>Belum Ada Data Aba-Aba/Penilaian untuk {{ $jenis->jenis_name }}</h4>
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