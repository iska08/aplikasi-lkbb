<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title }}</title>
        <style>
            body {
                font-family: 'Times New Roman', Times, serif;
                font-size: 16px;
            }
            .keterangan {
                font-size: 16px;
            }
            .bg-dark {
                background-color: darkgrey;
            }
            .table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 1rem;
                background-color: transparent;
            }
            .table th, .table td {
                padding: 0.5rem;
                vertical-align: top;
                border: 1px solid #000;
                font-size: 16px;
            }
            .text-center {
                text-align: center;
            }
            .kop {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 1rem;
                border: none;
            }
            .logo {
                width: 4cm;
                text-align: center;
                border: none;
            }
            .logo img {
                width: 3cm;
                height: 3cm;
                object-fit: contain;
            }
            .judul h1 {
                margin: 0;
                font-size: 34px;
            }
            .judul h2 {
                margin: 0;
                font-size: 24px;
            }
            .judul h3 {
                margin: 0;
                font-size: 18px;
            }
        </style>
    </head>
    <body>
        <table class="kop">
            <tr>
                <td class="logo">
                    <img src="{{ public_path('frontend/images/Logo LKBB.png') }}" alt="Logo LKBB">
                </td>
                <td class="judul text-center">
                    <h2>{{ $title }}</h2>
                    <h1>Nama LKBB</h1>
                    <h2>(Singkatan LKBB)</h2>
                    <h3>
                        Tingkat @if ($tingkatans->count())
                        @foreach ($tingkatans as $tingkatan)
                        {{ $tingkatan->nama_tingkatan }} 
                        @if (!$loop->last)
                            & 
                        @endif
                        @endforeach
                        @endif
                    </h3>
                </td>
                <td class="logo">
                    <img src="{{ public_path('frontend/images/Logo Paskibra.png') }}" alt="Logo Paskibra">
                </td>
            </tr>
        </table>
        <hr>
        <br>
        <div class="card mb-4 bg-secondary">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th rowspan="2" style="width: 5%">No. Urut</th>
                                <th rowspan="2">Asal Sekolah</th>
                                <th colspan="7">Nilai</th>
                                <th colspan="5">Ranking</th>
                            </tr>
                            <tr>
                                <th>PBB</th>
                                <th>Danton</th>
                                <th>Variasi</th>
                                <th>Formasi</th>
                                <th>Varfor</th>
                                <th>Utama</th>
                                <th>Umum</th>
                                <th>PBB</th>
                                <th>Danton</th>
                                <th>Varfor</th>
                                <th>Utama</th>
                                <th>Umum</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($pesertas->count())
                            @foreach ($pesertas as $peserta)
                            <tr>
                                <td style="vertical-align: middle !important;">{{ $peserta->no_urut }}</td>
                                <td style="vertical-align: middle !important;">{{ $peserta->name }}</td>
                                <td 
                                    @if ($pesertas->where('total_pbb', $peserta->total_pbb)->count() > 1) style="background-color: #F0F0F0; vertical-align: middle !important;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $peserta->total_pbb }}
                                </td>
                                <td 
                                    @if ($pesertas->where('total_danton', $peserta->total_danton)->count() > 1) style="background-color: #000000; vertical-align: middle !important; color: white;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $peserta->total_danton }}
                                </td>
                                <td style="vertical-align: middle !important;">{{ $peserta->total_variasi }}</td>
                                <td style="vertical-align: middle !important;">{{ $peserta->total_formasi }}</td>
                                <td 
                                    @if ($pesertas->where('total_varfor', $peserta->total_varfor)->count() > 1) style="background-color: #333333; vertical-align: middle !important; color: white;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $peserta->total_varfor }}
                                </td>
                                <td 
                                    @if ($pesertas->where('total_utama', $peserta->total_utama)->count() > 1) style="background-color: #FFD700; vertical-align: middle !important;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $peserta->total_utama }}
                                </td>
                                <td 
                                    @if ($pesertas->where('total_umum', $peserta->total_umum)->count() > 1) style="background-color: #8B0000; vertical-align: middle !important; color: white;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $peserta->total_umum }}
                                </td>
                                <td 
                                    @if ($peserta->rank_pbb === 1) style="background-color: #198754; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_pbb === 2) style="background-color: #0dcaf0; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_pbb === 3) style="background-color: #ffc107; vertical-align: middle !important;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $peserta->rank_pbb }}
                                    <br>
                                    @php
                                    $juara = $benefitpbbs->where('prioritas', $peserta->rank_pbb)->first();
                                    @endphp
                                    @if ($juara)
                                    <i>
                                        ({{ $juara->nama_juara }})
                                    </i>
                                    @else
                                    @endif
                                </td>
                                <td 
                                    @if ($peserta->rank_danton === 1) style="background-color: #198754; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_danton === 2) style="background-color: #0dcaf0; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_danton === 3) style="background-color: #ffc107; vertical-align: middle !important;"
                                    @else style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $peserta->rank_danton }}
                                    <br>
                                    @php
                                    $juara = $benefitdantons->where('prioritas', $peserta->rank_danton)->first();
                                    @endphp
                                    @if ($juara)
                                    <i>
                                        ({{ $juara->nama_juara }})
                                    </i>
                                    @else
                                    @endif
                                </td>
                                <td 
                                    @if (!$benefitvarfors->where('prioritas', $peserta->rank_varfor)->first()) 
                                        style="vertical-align: middle !important;"
                                    @elseif ($peserta->rank_varfor === 1 || $peserta->rank_varfor === 2 || $peserta->rank_varfor === 3) 
                                        style="background-color: #FFFF99; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_varfor === 4 || $peserta->rank_varfor === 5 || $peserta->rank_varfor === 6) 
                                        style="background-color: #99FF99; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_varfor === 7 || $peserta->rank_varfor === 8 || $peserta->rank_varfor === 9) 
                                        style="background-color: #99FFFF; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_varfor === 10 || $peserta->rank_varfor === 11 || $peserta->rank_varfor === 12) 
                                        style="background-color: #FFD699; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_varfor === 13 || $peserta->rank_varfor === 14 || $peserta->rank_varfor === 15) 
                                        style="background-color: #D8BFD8; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_varfor === 16 || $peserta->rank_varfor === 17 || $peserta->rank_varfor === 18) 
                                        style="background-color: #99CCFF; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_varfor === 19 || $peserta->rank_varfor === 20 || $peserta->rank_varfor === 21) 
                                        style="background-color: #FFCCCB; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_varfor === 22 || $peserta->rank_varfor === 23 || $peserta->rank_varfor === 24) 
                                        style="background-color: #D3D3D3; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_varfor === 25 || $peserta->rank_varfor === 26 || $peserta->rank_varfor === 27) 
                                        style="background-color: #D2B48C; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_varfor === 28 || $peserta->rank_varfor === 29 || $peserta->rank_varfor === 30) 
                                        style="background-color: #4682B4; vertical-align: middle !important;"
                                    @else 
                                        style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $peserta->rank_varfor }}
                                    <br>
                                    @php
                                    $juara = $benefitvarfors->where('prioritas', $peserta->rank_varfor)->first();
                                    @endphp
                                    @if ($juara)
                                    <i>
                                        ({{ $juara->nama_juara }})
                                    </i>
                                    @else
                                    @endif
                                </td>
                                <td 
                                    @if (!$benefitutamas->where('prioritas', $peserta->rank_utama)->first()) 
                                        style="vertical-align: middle !important;"
                                    @elseif ($peserta->rank_utama === 1 || $peserta->rank_utama === 2 || $peserta->rank_utama === 3) 
                                        style="background-color: #FFFF99; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_utama === 4 || $peserta->rank_utama === 5 || $peserta->rank_utama === 6) 
                                        style="background-color: #99FF99; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_utama === 7 || $peserta->rank_utama === 8 || $peserta->rank_utama === 9) 
                                        style="background-color: #99FFFF; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_utama === 10 || $peserta->rank_utama === 11 || $peserta->rank_utama === 12) 
                                        style="background-color: #FFD699; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_utama === 13 || $peserta->rank_utama === 14 || $peserta->rank_utama === 15) 
                                        style="background-color: #D8BFD8; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_utama === 16 || $peserta->rank_utama === 17 || $peserta->rank_utama === 18) 
                                        style="background-color: #99CCFF; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_utama === 19 || $peserta->rank_utama === 20 || $peserta->rank_utama === 21) 
                                        style="background-color: #FFCCCB; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_utama === 22 || $peserta->rank_utama === 23 || $peserta->rank_utama === 24) 
                                        style="background-color: #D3D3D3; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_utama === 25 || $peserta->rank_utama === 26 || $peserta->rank_utama === 27) 
                                        style="background-color: #D2B48C; vertical-align: middle !important;"
                                    @elseif ($peserta->rank_utama === 28 || $peserta->rank_utama === 29 || $peserta->rank_utama === 30) 
                                        style="background-color: #4682B4; vertical-align: middle !important;"
                                    @else 
                                        style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $peserta->rank_utama }}
                                    <br>
                                    @php
                                    $juara = $benefitutamas->where('prioritas', $peserta->rank_utama)->first();
                                    @endphp
                                    @if ($juara)
                                    <i>
                                        ({{ $juara->nama_juara }})
                                    </i>
                                    @else
                                    @endif
                                </td>
                                <td 
                                    @if (!$benefitumums->where('prioritas', $peserta->rank_umum)->first()) 
                                        style="vertical-align: middle !important;"
                                    @elseif ($peserta->rank_umum === 1) 
                                        style="background-color: gold; vertical-align: middle !important;"
                                    @else 
                                        style="vertical-align: middle !important;"
                                    @endif
                                >
                                    {{ $peserta->rank_umum }}
                                    <br>
                                    @php
                                    $juara = $benefitumums->where('prioritas', $peserta->rank_umum)->first();
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
        <div class="card mb-4 bg-secondary alert">
            <h5 class="mb-2"><strong>Keterangan Warna</strong></h5>
            <ul>
                <li><span class="badge" style="background-color: #8B0000; padding: 5px; border-radius: 3px; color: #000;">Merah Gelap</span> - Nilai Duplikat di PBB</li>
                <li><span class="badge" style="background-color: #FFCC80; padding: 5px; border-radius: 3px; color: #000;">Oranye Muda</span> - Nilai Duplikat di Danton</li>
                <li><span class="badge" style="background-color: #FFD700; padding: 5px; border-radius: 3px; color: #000;">Kuning Emas	</span> - Nilai Duplikat di Varfor</li>
                <li><span class="badge" style="background-color: #333333; padding: 5px; border-radius: 3px; color: #000;">Abu-abu Tua</span> - Nilai Duplikat di Utama</li>
                <li><span class="badge" style="background-color: #F0F0F0; padding: 5px; border-radius: 3px; color: #000;">Putih Pudar</span> - Nilai Duplikat di Umum</li>
                <br>
                <li><span class="badge" style="background-color: #198754; padding: 5px; border-radius: 3px; color: #000;">Hijau</span> - Peringkat 1 (PBB & Danton)</li>
                <li><span class="badge" style="background-color: #0dcaf0; padding: 5px; border-radius: 3px; color: #000;">Biru</span> - Peringkat 2 (PBB & Danton)</li>
                <li><span class="badge" style="background-color: #ffc107; padding: 5px; border-radius: 3px; color: #000;">Kuning</span> - Peringkat 3 (PBB & Danton)</li>
                <br>
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
    </body>
</html>