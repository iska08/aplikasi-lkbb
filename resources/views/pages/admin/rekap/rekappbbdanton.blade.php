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
                                <th colspan="2">PBB</th>
                                <th colspan="2">Danton</th>
                                <th colspan="2">Utama</th>
                            </tr>
                            <tr>
                                <th style="width: 11%">Nilai PBB</th>
                                <th style="width: 11%">Ranking PBB</th>
                                <th style="width: 11%">Nilai Danton</th>
                                <th style="width: 11%">Ranking Danton</th>
                                <th style="width: 11%">Nilai Utama</th>
                                <th style="width: 11%">Ranking Utama</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($pesertas->count())
                                @foreach ($pesertas as $peserta)
                                    <tr>
                                        <td>{{ $peserta->no_urut }}</td>
                                        <td>{{ $peserta->name }}</td>
                                        {{-- Nilai dan Ranking PBB --}}
                                        <td>{{ $peserta->total_pbb }}</td>
                                        <td class="
                                            @if ($peserta->rank_pbb === 1) table-warning {{-- Gold --}}
                                            @elseif ($peserta->rank_pbb === 2) table-secondary {{-- Silver --}}
                                            @elseif ($peserta->rank_pbb === 3) table-info {{-- Bronze --}}
                                            @elseif ($pesertas->where('rank_pbb', $peserta->rank_pbb)->count() > 1) table-danger {{-- Red for duplicate --}}
                                            @endif
                                        ">
                                            {{ $peserta->rank_pbb }}
                                        </td>
                                        {{-- Nilai dan Ranking Danton --}}
                                        <td>{{ $peserta->total_danton }}</td>
                                        <td class="
                                            @if ($peserta->rank_danton === 1) table-warning
                                            @elseif ($peserta->rank_danton === 2) table-secondary
                                            @elseif ($peserta->rank_danton === 3) table-info
                                            @elseif ($pesertas->where('rank_danton', $peserta->rank_danton)->count() > 1) table-danger
                                            @endif
                                        ">
                                            {{ $peserta->rank_danton }}
                                        </td>
                                        {{-- Nilai dan Ranking Utama --}}
                                        <td>{{ $peserta->total_utama }}</td>
                                        <td class="
                                            @if ($peserta->rank_utama === 1) table-warning
                                            @elseif ($peserta->rank_utama === 2) table-secondary
                                            @elseif ($peserta->rank_utama === 3) table-info
                                            @elseif ($pesertas->where('rank_utama', $peserta->rank_utama)->count() > 1) table-danger
                                            @endif
                                        ">
                                            {{ $peserta->rank_utama }}
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