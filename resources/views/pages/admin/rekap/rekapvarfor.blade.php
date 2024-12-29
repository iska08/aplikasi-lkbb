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
        {{-- Tabel Rekap --}}
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
                                <th style="width: 14%">Ranking Variasi</th>
                                <th style="width: 12%">Nilai Formasi</th>
                                <th style="width: 14%">Ranking Formasi</th>
                                <th style="width: 12%">Nilai Var-For</th>
                                <th style="width: 18%">Ranking Var-For</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($pesertas->count())
                            @foreach ($pesertas as $peserta)
                            <tr>
                                <td style="vertical-align: middle !important;">{{ $peserta->no_urut }}</td>
                                <td style="vertical-align: middle !important;">{{ $peserta->name }}</td>
                                {{-- Nilai dan Ranking Variasi --}}
                                <td style="vertical-align: middle !important;">{{ $peserta->total_variasi }}</td>
                                <td @if ($pesertas->where('rank_variasi', $peserta->rank_variasi)->count() > 1) style="background-color: #dc3545; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_variasi === 1) style="background-color: #198754; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_variasi === 2) style="background-color: #0dcaf0; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_variasi === 3) style="background-color: #ffc107; vertical-align: middle !important;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $peserta->rank_variasi }}
                                </td>
                                {{-- Nilai dan Ranking Formasi --}}
                                <td style="vertical-align: middle !important;">{{ $peserta->total_formasi }}</td>
                                <td @if ($pesertas->where('rank_formasi', $peserta->rank_formasi)->count() > 1) style="background-color: #dc3545; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_formasi === 1) style="background-color: #198754; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_formasi === 2) style="background-color: #0dcaf0; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_formasi === 3) style="background-color: #ffc107; vertical-align: middle !important;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $peserta->rank_formasi }}
                                </td>
                                {{-- Nilai dan Ranking Var-For --}}
                                <td style="vertical-align: middle !important;">{{ $peserta->total_varfor }}</td>
                                <td @if ($pesertas->where('rank_varfor', $peserta->rank_varfor)->count() > 1) style="background-color: #dc3545; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_varfor === 1 || $peserta->rank_varfor === 2 || $peserta->rank_varfor === 3) style="background-color: #FFFF99; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_varfor === 4 || $peserta->rank_varfor === 5 || $peserta->rank_varfor === 6) style="background-color: #99FF99; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_varfor === 7 || $peserta->rank_varfor === 8 || $peserta->rank_varfor === 9) style="background-color: #99FFFF; vertical-align: middle !important;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $peserta->rank_varfor }}
                                    <br>
                                    @php
                                    $juara = $benefitvarfors->where('prioritas', $peserta->rank_varfor)->first();
                                    @endphp
                                    @if ($juara)
                                    ({{ $juara->nama_juara }})
                                    @else
                                    (Tidak Ada Juara)
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="8" class="text-danger text-center">
                                    <h4>Belum Ada Data Nilai</h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Keterangan Fungsi Warna --}}
        <div class="card mb-4 bg-secondary alert">
            <h5 class="mb-2"><strong>Keterangan Warna</strong></h5>
            <ul>
                <li><span class="badge" style="background-color: #198754; padding: 5px; border-radius: 3px; color: #000;">Hijau</span> - Peringkat 1</li>
                <li><span class="badge" style="background-color: #0dcaf0; padding: 5px; border-radius: 3px; color: #000;">Biru</span> - Peringkat 2</li>
                <li><span class="badge" style="background-color: #ffc107; padding: 5px; border-radius: 3px; color: #000;">Kuning</span> - Peringkat 3</li>
                <li><span class="badge" style="background-color: #dc3545; padding: 5px; border-radius: 3px; color: #000;">Merah</span> - Peringkat sama (terjadi duplikasi peringkat)</li>
                <li><span class="badge" style="background-color: #FFFF99; padding: 5px; border-radius: 3px; color: #000;">Kuning Terang</span> - Peringkat 1-3 (Var-For)</li>
                <li><span class="badge" style="background-color: #99FF99; padding: 5px; border-radius: 3px; color: #000;">Hijau Muda</span> - Peringkat 4-6 (Var-For)</li>
                <li><span class="badge" style="background-color: #99FFFF; padding: 5px; border-radius: 3px; color: #000;">Cyan</span> - Peringkat 7-9 (Var-For)</li>
            </ul>
        </div>
    </div>
</main>
@endsection