@extends('layouts.admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="row align-items-center">
            <div class="col-sm-6 col-md-12">
                <h1 class="mt-4">{{ $title }}</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('rekap.rekapakhir') }}">Rekap Nilai Akhir</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        <div class="card mb-4 bg-secondary">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th rowspan="2" style="width: 5%">No. Urut</th>
                                <th rowspan="2">Asal Sekolah</th>
                                <th colspan="2">Variasi</th>
                                <th colspan="2">Formasi</th>
                                <th colspan="2">Var-For</th>
                            </tr>
                            <tr>
                                <th style="width: 11%">Nilai Variasi</th>
                                <th style="width: 11%">Ranking Variasi</th>
                                <th style="width: 11%">Nilai Formasi</th>
                                <th style="width: 11%">Ranking Formasi</th>
                                <th style="width: 11%">Nilai Var-For</th>
                                <th style="width: 11%">Ranking Var-For</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($pesertas->count())
                                @foreach ($pesertas as $peserta)
                                    <tr>
                                        <td>{{ $peserta->no_urut }}</td>
                                        <td>{{ $peserta->name }}</td>
                                        {{-- Nilai dan Ranking Variasi --}}
                                        <td>{{ $peserta->total_variasi }}</td>
                                        <td class="
                                            @if ($peserta->rank_variasi === 1) table-warning {{-- Gold --}}
                                            @elseif ($peserta->rank_variasi === 2) table-secondary {{-- Silver --}}
                                            @elseif ($peserta->rank_variasi === 3) table-info {{-- Bronze --}}
                                            @elseif ($pesertas->where('rank_variasi', $peserta->rank_variasi)->count() > 1) table-danger {{-- Red for duplicate --}}
                                            @endif
                                        ">
                                            {{ $peserta->rank_variasi }}
                                        </td>
                                        {{-- Nilai dan Ranking Formasi --}}
                                        <td>{{ $peserta->total_formasi }}</td>
                                        <td class="
                                            @if ($peserta->rank_formasi === 1) table-warning
                                            @elseif ($peserta->rank_formasi === 2) table-secondary
                                            @elseif ($peserta->rank_formasi === 3) table-info
                                            @elseif ($pesertas->where('rank_formasi', $peserta->rank_formasi)->count() > 1) table-danger
                                            @endif
                                        ">
                                            {{ $peserta->rank_formasi }}
                                        </td>
                                        {{-- Nilai dan Ranking Var-For --}}
                                        <td>{{ $peserta->total_varfor }}</td>
                                        <td class="
                                            @if ($peserta->rank_varfor === 1) table-warning
                                            @elseif ($peserta->rank_varfor === 2) table-secondary
                                            @elseif ($peserta->rank_varfor === 3) table-info
                                            @elseif ($pesertas->where('rank_varfor', $peserta->rank_varfor)->count() > 1) table-danger
                                            @endif
                                        ">
                                            {{ $peserta->rank_varfor }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-danger text-center">
                                        <h4>Belum Ada Data Posisi</h4>
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