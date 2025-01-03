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
                <h4 class="text-center" style="font-size: 30px">Rekap Nilai Keseluruhan</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th style="vertical-align: middle !important; background-color: #198754; width: 2cm;">No. Urut</th>
                                <th style="vertical-align: middle !important; background-color: #198754; width: 4cm;">Asal Sekolah</th>
                                <th style="background-color: #4682B4;">PBB</th>
                                <th style="background-color: #4682B4;">Danton</th>
                                <th style="background-color: #4682B4;">Pengurangan<br>Nilai</th>
                                <th style="background-color: #4682B4;">Utama</th>
                                <th style="background-color: sandybrown;">Variasi</th>
                                <th style="background-color: sandybrown;">Formasi</th>
                                <th style="background-color: sandybrown;">Varfor</th>
                                <th style="background-color: #0DCAF0; color: #000;">Umum</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($rekapNilais->count())
                            @foreach ($rekapNilais as $rekapNilai)
                            <tr>
                                <td style="vertical-align: middle !important;">{{ $rekapNilai->no_urut }}</td>
                                <td style="vertical-align: middle !important; width: max-content;">{{ $rekapNilai->name }}</td>
                                <td 
                                    @if ($rekapNilais->where('total_pbb', $rekapNilai->total_pbb)->count() > 1) style="background-color: #8B0000; vertical-align: middle !important; color: white;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $rekapNilai->total_pbb }}
                                </td>
                                <td 
                                    @if ($rekapNilais->where('total_danton', $rekapNilai->total_danton)->count() > 1) style="background-color: #8B0000; vertical-align: middle !important; color: white;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $rekapNilai->total_danton }}
                                </td>
                                <td style="vertical-align: middle !important;">-{{ $rekapNilai->minus_poin }}</td>
                                <td 
                                    @if ($rekapNilais->where('total_utama', $rekapNilai->total_utama)->count() > 1) style="background-color: #8B0000; vertical-align: middle !important; color: white;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $rekapNilai->total_utama }}
                                </td>
                                <td style="vertical-align: middle !important;">{{ $rekapNilai->total_variasi }}</td>
                                <td style="vertical-align: middle !important;">{{ $rekapNilai->total_formasi }}</td>
                                <td 
                                    @if ($rekapNilais->where('total_varfor', $rekapNilai->total_varfor)->count() > 1) style="background-color: #8B0000; vertical-align: middle !important; color: white;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $rekapNilai->total_varfor }}
                                </td>
                                <td 
                                    @if ($rekapNilais->where('total_umum', $rekapNilai->total_umum)->count() > 1) 
                                        style="background-color: #8B0000; vertical-align: middle !important; color: white;"
                                    @elseif ($rekapNilai->rank_umum === 1) 
                                        style="background-color: #FFD700; vertical-align: middle !important;"
                                    @else 
                                        style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $rekapNilai->total_umum }}
                                    <br>
                                    @php
                                    $juara = $benefitumums->where('prioritas', $rekapNilai->rank_umum)->first();
                                    @endphp
                                    @if ($juara)
                                    <i>
                                        ({{ $juara->nama_juara }})
                                    </i>
                                    @else
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="10" class="text-danger text-center">
                                    <h4>Belum Ada Data Nilai</h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <h4 class="text-center" style="font-size: 30px">Ranking Utama dan Best PBB/Danton</h4>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th style="vertical-align: middle !important; background-color: #198754; width: 2cm;">No. Urut</th>
                                <th style="vertical-align: middle !important; background-color: #198754; width: 4cm;">Asal Sekolah</th>
                                <th style="background-color: #4682B4;">PBB</th>
                                <th style="background-color: #4682B4;">Danton</th>
                                <th style="background-color: #4682B4;">Pengurangan<br>Nilai</th>
                                <th style="background-color: #4682B4;">Utama</th>
                                <th style="background-color: #0DCAF0; color: #000;">Ranking<br>PBB</th>
                                <th style="background-color: #0DCAF0; color: #000;">Ranking<br>Danton</th>
                                <th style="background-color: #0DCAF0; color: #000;">Ranking<br>Utama</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($rankingPBBs->count())
                            @foreach ($rankingPBBs as $rankingPBB)
                            <tr>
                            <td style="vertical-align: middle !important;">{{ $rankingPBB->no_urut }}</td>
                                <td style="vertical-align: middle !important; width: max-content;">{{ $rankingPBB->name }}</td>
                                <td 
                                    @if ($rankingPBBs->where('total_pbb', $rankingPBB->total_pbb)->count() > 1) style="background-color: #8B0000; vertical-align: middle !important; color: white;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $rankingPBB->total_pbb }}
                                </td>
                                <td 
                                    @if ($rankingPBBs->where('total_danton', $rankingPBB->total_danton)->count() > 1) style="background-color: #8B0000; vertical-align: middle !important; color: white;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $rankingPBB->total_danton }}
                                </td>
                                <td style="vertical-align: middle !important;">-{{ $rankingPBB->minus_poin }}</td>
                                <td 
                                    @if ($rankingPBBs->where('total_utama', $rankingPBB->total_utama)->count() > 1) style="background-color: #8B0000; vertical-align: middle !important; color: white;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $rankingPBB->total_utama }}
                                </td>
                                <td 
                                    @if ($rankingPBB->rank_pbb === 1) style="background-color: #FFD700; vertical-align: middle !important;"
                                    @elseif ($rankingPBB->rank_pbb === 2) style="background-color: #C0C0C0; vertical-align: middle !important;"
                                    @elseif ($rankingPBB->rank_pbb === 3) style="background-color: #CD7F32; vertical-align: middle !important;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $rankingPBB->rank_pbb }}
                                    <br>
                                    @php
                                    $juara = $benefitpbbs->where('prioritas', $rankingPBB->rank_pbb)->first();
                                    @endphp
                                    @if ($juara)
                                    <i>
                                        ({{ $juara->nama_juara }})
                                    </i>
                                    @else
                                    @endif
                                </td>
                                <td 
                                    @if ($rankingPBB->rank_danton === 1) style="background-color: #FFD700; vertical-align: middle !important;"
                                    @elseif ($rankingPBB->rank_danton === 2) style="background-color: #C0C0C0; vertical-align: middle !important;"
                                    @elseif ($rankingPBB->rank_danton === 3) style="background-color: #CD7F32; vertical-align: middle !important;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $rankingPBB->rank_danton }}
                                    <br>
                                    @php
                                    $juara = $benefitdantons->where('prioritas', $rankingPBB->rank_danton)->first();
                                    @endphp
                                    @if ($juara)
                                    <i>
                                        ({{ $juara->nama_juara }})
                                    </i>
                                    @else
                                    @endif
                                </td>
                                <td 
                                    @if (!$benefitutamas->where('prioritas', $rankingPBB->rank_utama)->first()) 
                                        style="vertical-align: middle !important;"
                                    @elseif ($rankingPBB->rank_utama === 1 || $rankingPBB->rank_utama === 2 || $rankingPBB->rank_utama === 3) 
                                        style="background-color: #FFFF99; vertical-align: middle !important;"
                                    @elseif ($rankingPBB->rank_utama === 4 || $rankingPBB->rank_utama === 5 || $rankingPBB->rank_utama === 6) 
                                        style="background-color: #99FF99; vertical-align: middle !important;"
                                    @elseif ($rankingPBB->rank_utama === 7 || $rankingPBB->rank_utama === 8 || $rankingPBB->rank_utama === 9) 
                                        style="background-color: #99FFFF; vertical-align: middle !important;"
                                    @elseif ($rankingPBB->rank_utama === 10 || $rankingPBB->rank_utama === 11 || $rankingPBB->rank_utama === 12) 
                                        style="background-color: #FFD699; vertical-align: middle !important;"
                                    @elseif ($rankingPBB->rank_utama === 13 || $rankingPBB->rank_utama === 14 || $rankingPBB->rank_utama === 15) 
                                        style="background-color: #D8BFD8; vertical-align: middle !important;"
                                    @elseif ($rankingPBB->rank_utama === 16 || $rankingPBB->rank_utama === 17 || $rankingPBB->rank_utama === 18) 
                                        style="background-color: #99CCFF; vertical-align: middle !important;"
                                    @elseif ($rankingPBB->rank_utama === 19 || $rankingPBB->rank_utama === 20 || $rankingPBB->rank_utama === 21) 
                                        style="background-color: #FFCCCB; vertical-align: middle !important;"
                                    @elseif ($rankingPBB->rank_utama === 22 || $rankingPBB->rank_utama === 23 || $rankingPBB->rank_utama === 24) 
                                        style="background-color: #D3D3D3; vertical-align: middle !important;"
                                    @elseif ($rankingPBB->rank_utama === 25 || $rankingPBB->rank_utama === 26 || $rankingPBB->rank_utama === 27) 
                                        style="background-color: #D2B48C; vertical-align: middle !important;"
                                    @elseif ($rankingPBB->rank_utama === 28 || $rankingPBB->rank_utama === 29 || $rankingPBB->rank_utama === 30) 
                                        style="background-color: #4682B4; vertical-align: middle !important;"
                                    @else 
                                        style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $rankingPBB->rank_utama }}
                                    <br>
                                    @php
                                    $juara = $benefitutamas->where('prioritas', $rankingPBB->rank_utama)->first();
                                    @endphp
                                    @if ($juara)
                                    <i>
                                        ({{ $juara->nama_juara }})
                                    </i>
                                    @else
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="9" class="text-danger text-center">
                                    <h4>Belum Ada Data Nilai</h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <h4 class="text-center" style="font-size: 30px">Ranking Varfor</h4>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th style="vertical-align: middle !important; background-color: #198754; width: 2cm;">No. Urut</th>
                                <th style="vertical-align: middle !important; background-color: #198754; width: 4cm;">Asal Sekolah</th>
                                <th style="background-color: #4682B4;">Variasi</th>
                                <th style="background-color: #4682B4;">Formasi</th>
                                <th style="background-color: #4682B4;">Varfor</th>
                                <th style="background-color: #0DCAF0; color: #000; width: 5.5cm">Ranking Varfor</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($rankingVarfors->count())
                            @foreach ($rankingVarfors as $rankingVarfor)
                            <tr>
                                <td style="vertical-align: middle !important;">{{ $rankingVarfor->no_urut }}</td>
                                <td style="vertical-align: middle !important; width: max-content;">{{ $rankingVarfor->name }}</td>
                                <td style="vertical-align: middle !important;">{{ $rankingVarfor->total_variasi }}</td>
                                <td style="vertical-align: middle !important;">{{ $rankingVarfor->total_formasi }}</td>
                                <td 
                                    @if ($rankingVarfors->where('total_varfor', $rankingVarfor->total_varfor)->count() > 1) style="background-color: #8B0000; vertical-align: middle !important; color: white;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $rankingVarfor->total_varfor }}
                                </td>
                                <td 
                                    @if (!$benefitvarfors->where('prioritas', $rankingVarfor->rank_varfor)->first()) 
                                        style="vertical-align: middle !important;"
                                    @elseif ($rankingVarfor->rank_varfor === 1 || $rankingVarfor->rank_varfor === 2 || $rankingVarfor->rank_varfor === 3) 
                                        style="background-color: #FFFF99; vertical-align: middle !important;"
                                    @elseif ($rankingVarfor->rank_varfor === 4 || $rankingVarfor->rank_varfor === 5 || $rankingVarfor->rank_varfor === 6) 
                                        style="background-color: #99FF99; vertical-align: middle !important;"
                                    @elseif ($rankingVarfor->rank_varfor === 7 || $rankingVarfor->rank_varfor === 8 || $rankingVarfor->rank_varfor === 9) 
                                        style="background-color: #99FFFF; vertical-align: middle !important;"
                                    @elseif ($rankingVarfor->rank_varfor === 10 || $rankingVarfor->rank_varfor === 11 || $rankingVarfor->rank_varfor === 12) 
                                        style="background-color: #FFD699; vertical-align: middle !important;"
                                    @elseif ($rankingVarfor->rank_varfor === 13 || $rankingVarfor->rank_varfor === 14 || $rankingVarfor->rank_varfor === 15) 
                                        style="background-color: #D8BFD8; vertical-align: middle !important;"
                                    @elseif ($rankingVarfor->rank_varfor === 16 || $rankingVarfor->rank_varfor === 17 || $rankingVarfor->rank_varfor === 18) 
                                        style="background-color: #99CCFF; vertical-align: middle !important;"
                                    @elseif ($rankingVarfor->rank_varfor === 19 || $rankingVarfor->rank_varfor === 20 || $rankingVarfor->rank_varfor === 21) 
                                        style="background-color: #FFCCCB; vertical-align: middle !important;"
                                    @elseif ($rankingVarfor->rank_varfor === 22 || $rankingVarfor->rank_varfor === 23 || $rankingVarfor->rank_varfor === 24) 
                                        style="background-color: #D3D3D3; vertical-align: middle !important;"
                                    @elseif ($rankingVarfor->rank_varfor === 25 || $rankingVarfor->rank_varfor === 26 || $rankingVarfor->rank_varfor === 27) 
                                        style="background-color: #D2B48C; vertical-align: middle !important;"
                                    @elseif ($rankingVarfor->rank_varfor === 28 || $rankingVarfor->rank_varfor === 29 || $rankingVarfor->rank_varfor === 30) 
                                        style="background-color: #4682B4; vertical-align: middle !important;"
                                    @else 
                                        style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $rankingVarfor->rank_varfor }}
                                    <br>
                                    @php
                                    $juara = $benefitvarfors->where('prioritas', $rankingVarfor->rank_varfor)->first();
                                    @endphp
                                    @if ($juara)
                                    <i>
                                        ({{ $juara->nama_juara }})
                                    </i>
                                    @else
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6" class="text-danger text-center">
                                    <h4>Belum Ada Data Nilai</h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mb-3 text-center">
                <a href="{{ route('rekap.rekapnilaiakhirpdf', $id) }}" class="btn btn-dark me-2" target="_blank">
                    Download Rekap Nilai
                </a>
            </div>
        </div>
        <div class="card mb-4 bg-secondary alert">
            <h5 class="mb-2"><strong>Keterangan Warna</strong></h5>
            <ul>
                <li><span class="badge" style="background-color: #8B0000; padding: 5px; border-radius: 3px;">Merah Gelap</span> - Nilai Duplikat</li>
                <li><span class="badge" style="background-color: #FFD700; padding: 5px; border-radius: 3px; color: #000;">Emas</span> - Peringkat 1 (PBB & Danton)</li>
                <li><span class="badge" style="background-color: #C0C0C0; padding: 5px; border-radius: 3px; color: #000;">Perak</span> - Peringkat 2 (PBB & Danton)</li>
                <li><span class="badge" style="background-color: #CD7F32; padding: 5px; border-radius: 3px; color: #000;">Perunggu</span> - Peringkat 3 (PBB & Danton)</li>
                @if ($benefitutamas->count() == 3)
                <li><span class="badge" style="background-color: #FFFF99; padding: 5px; border-radius: 3px; color: #000;">Kuning Terang</span> - Peringkat 1-3 (Utama & Varfor)</li>
                @elseif ($benefitutamas->count() == 6)
                <li><span class="badge" style="background-color: #FFFF99; padding: 5px; border-radius: 3px; color: #000;">Kuning Terang</span> - Peringkat 1-3 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99FF99; padding: 5px; border-radius: 3px; color: #000;">Hijau Muda</span> - Peringkat 4-6 (Utama & Varfor)</li>
                @elseif ($benefitutamas->count() == 9)
                <li><span class="badge" style="background-color: #FFFF99; padding: 5px; border-radius: 3px; color: #000;">Kuning Terang</span> - Peringkat 1-3 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99FF99; padding: 5px; border-radius: 3px; color: #000;">Hijau Muda</span> - Peringkat 4-6 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99FFFF; padding: 5px; border-radius: 3px; color: #000;">Cyan</span> - Peringkat 7-9 (Utama & Varfor)</li>
                @elseif ($benefitutamas->count() == 12)
                <li><span class="badge" style="background-color: #FFFF99; padding: 5px; border-radius: 3px; color: #000;">Kuning Terang</span> - Peringkat 1-3 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99FF99; padding: 5px; border-radius: 3px; color: #000;">Hijau Muda</span> - Peringkat 4-6 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99FFFF; padding: 5px; border-radius: 3px; color: #000;">Cyan</span> - Peringkat 7-9 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #FFD699; padding: 5px; border-radius: 3px; color: #000;">Oranye Muda</span> - Peringkat 10-12 (Utama & Varfor)</li>
                @elseif ($benefitutamas->count() == 15)
                <li><span class="badge" style="background-color: #FFFF99; padding: 5px; border-radius: 3px; color: #000;">Kuning Terang</span> - Peringkat 1-3 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99FF99; padding: 5px; border-radius: 3px; color: #000;">Hijau Muda</span> - Peringkat 4-6 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99FFFF; padding: 5px; border-radius: 3px; color: #000;">Cyan</span> - Peringkat 7-9 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #FFD699; padding: 5px; border-radius: 3px; color: #000;">Oranye Muda</span> - Peringkat 10-12 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #D8BFD8; padding: 5px; border-radius: 3px; color: #000;">Ungu Muda</span> - Peringkat 13-15 (Utama & Varfor)</li>
                @elseif ($benefitutamas->count() == 18)
                <li><span class="badge" style="background-color: #FFFF99; padding: 5px; border-radius: 3px; color: #000;">Kuning Terang</span> - Peringkat 1-3 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99FF99; padding: 5px; border-radius: 3px; color: #000;">Hijau Muda</span> - Peringkat 4-6 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99FFFF; padding: 5px; border-radius: 3px; color: #000;">Cyan</span> - Peringkat 7-9 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #FFD699; padding: 5px; border-radius: 3px; color: #000;">Oranye Muda</span> - Peringkat 10-12 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #D8BFD8; padding: 5px; border-radius: 3px; color: #000;">Ungu Muda</span> - Peringkat 13-15 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99CCFF; padding: 5px; border-radius: 3px; color: #000;">Biru Pastel</span> - Peringkat 16-18 (Utama & Varfor)</li>
                @elseif ($benefitutamas->count() == 21)
                <li><span class="badge" style="background-color: #FFFF99; padding: 5px; border-radius: 3px; color: #000;">Kuning Terang</span> - Peringkat 1-3 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99FF99; padding: 5px; border-radius: 3px; color: #000;">Hijau Muda</span> - Peringkat 4-6 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99FFFF; padding: 5px; border-radius: 3px; color: #000;">Cyan</span> - Peringkat 7-9 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #FFD699; padding: 5px; border-radius: 3px; color: #000;">Oranye Muda</span> - Peringkat 10-12 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #D8BFD8; padding: 5px; border-radius: 3px; color: #000;">Ungu Muda</span> - Peringkat 13-15 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99CCFF; padding: 5px; border-radius: 3px; color: #000;">Biru Pastel</span> - Peringkat 16-18 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #FFCCCB; padding: 5px; border-radius: 3px; color: #000;">Pink Lembut</span> - Peringkat 19-21 (Utama & Varfor)</li>
                @elseif ($benefitutamas->count() == 24)
                <li><span class="badge" style="background-color: #FFFF99; padding: 5px; border-radius: 3px; color: #000;">Kuning Terang</span> - Peringkat 1-3 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99FF99; padding: 5px; border-radius: 3px; color: #000;">Hijau Muda</span> - Peringkat 4-6 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99FFFF; padding: 5px; border-radius: 3px; color: #000;">Cyan</span> - Peringkat 7-9 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #FFD699; padding: 5px; border-radius: 3px; color: #000;">Oranye Muda</span> - Peringkat 10-12 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #D8BFD8; padding: 5px; border-radius: 3px; color: #000;">Ungu Muda</span> - Peringkat 13-15 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99CCFF; padding: 5px; border-radius: 3px; color: #000;">Biru Pastel</span> - Peringkat 16-18 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #FFCCCB; padding: 5px; border-radius: 3px; color: #000;">Pink Lembut</span> - Peringkat 19-21 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #D3D3D3; padding: 5px; border-radius: 3px; color: #000;">Abu-Abu Terang</span> - Peringkat 22-24 (Utama & Varfor)</li>
                @elseif ($benefitutamas->count() == 27)
                <li><span class="badge" style="background-color: #FFFF99; padding: 5px; border-radius: 3px; color: #000;">Kuning Terang</span> - Peringkat 1-3 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99FF99; padding: 5px; border-radius: 3px; color: #000;">Hijau Muda</span> - Peringkat 4-6 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99FFFF; padding: 5px; border-radius: 3px; color: #000;">Cyan</span> - Peringkat 7-9 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #FFD699; padding: 5px; border-radius: 3px; color: #000;">Oranye Muda</span> - Peringkat 10-12 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #D8BFD8; padding: 5px; border-radius: 3px; color: #000;">Ungu Muda</span> - Peringkat 13-15 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99CCFF; padding: 5px; border-radius: 3px; color: #000;">Biru Pastel</span> - Peringkat 16-18 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #FFCCCB; padding: 5px; border-radius: 3px; color: #000;">Pink Lembut</span> - Peringkat 19-21 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #D3D3D3; padding: 5px; border-radius: 3px; color: #000;">Abu-Abu Terang</span> - Peringkat 22-24 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #D2B48C; padding: 5px; border-radius: 3px; color: #000;">Cokelat Terang</span> - Peringkat 25-27 (Utama & Varfor)</li>
                @elseif ($benefitutamas->count() == 30)
                <li><span class="badge" style="background-color: #FFFF99; padding: 5px; border-radius: 3px; color: #000;">Kuning Terang</span> - Peringkat 1-3 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99FF99; padding: 5px; border-radius: 3px; color: #000;">Hijau Muda</span> - Peringkat 4-6 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99FFFF; padding: 5px; border-radius: 3px; color: #000;">Cyan</span> - Peringkat 7-9 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #FFD699; padding: 5px; border-radius: 3px; color: #000;">Oranye Muda</span> - Peringkat 10-12 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #D8BFD8; padding: 5px; border-radius: 3px; color: #000;">Ungu Muda</span> - Peringkat 13-15 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #99CCFF; padding: 5px; border-radius: 3px; color: #000;">Biru Pastel</span> - Peringkat 16-18 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #FFCCCB; padding: 5px; border-radius: 3px; color: #000;">Pink Lembut</span> - Peringkat 19-21 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #D3D3D3; padding: 5px; border-radius: 3px; color: #000;">Abu-Abu Terang</span> - Peringkat 22-24 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #D2B48C; padding: 5px; border-radius: 3px; color: #000;">Cokelat Terang</span> - Peringkat 25-27 (Utama & Varfor)</li>
                <li><span class="badge" style="background-color: #4682B4; padding: 5px; border-radius: 3px; color: #000;">Biru Laut</span> - Peringkat 28-30 (Utama & Varfor)</li>
                @endif
            </ul>
        </div>
    </div>
</main>
@endsection