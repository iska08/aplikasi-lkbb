@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Jenis Aba-Aba: {{ $jenises->jenis_name }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('jenis.index') }}">Data Jenis Aba-Aba</a></li>
        <li class="breadcrumb-item active">{{ $title }}</li>
    </ol>
    <div class="card mb-4 bg-secondary">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-dark text-center text-white">
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Nama Aba-Aba</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $filteredAbaabas = $abaabas->where('jenis_id', $jenises->id);
                        @endphp
                        @if ($filteredAbaabas->count())
                        @foreach ($filteredAbaabas as $abaaba)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $abaaba->nama_abaaba }}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="2" class="text-danger text-center">
                                <h4>Belum Ada Data Aba-Aba/Penilaian untuk {{ $jenises->jenis_name }} - {{ $tingkatans->nama_tingkatan }}</h4>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection