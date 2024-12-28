<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title }}</title>
        <style>
            body {
                font-family: 'Times New Roman', Times, serif;
                font-size: 12px;
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
            }
            .thead-variasi th {
                background-color: #CCFF99;
                color: #000;
                border-bottom: 2px solid #000;
            }
            .thead-formasi th {
                background-color: #99FF99;
                color: #000;
                border-bottom: 2px solid #000;
            }
            .thead-total th {
                background-color: #D9D9D9;
                color: #000;
                border-bottom: 2px solid #000;
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
                width: 2.5cm;
                text-align: center;
                border: none;
            }
            .judul h1 {
                margin: 0;
                font-size: 24px;
            }
            .judul h2 {
                margin: 0;
                font-size: 18px;
            }
            .judul h3 {
                margin: 0;
                font-size: 14px;
            }
            .sekolah {
                width: 100%;
                border-collapse: collapse;
                border: none;
            }
            .asal {
                width: 50%;
                text-align: left;
                border: none;
            }
            .urut {
                width: 50%;
                text-align: right;
                border: none;
            }
        </style>
    </head>
    <body>
    <table class="kop">
            <tr>
                <td class="logo">
                    <img src="{{ public_path('frontend/images/Logo LKBB.png') }}" alt="Logo LKBB" style="width: 2cm; height: 2cm; object-fit: contain;">
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
                    <img src="{{ public_path('frontend/images/Logo Paskibra.png') }}" alt="Logo Paskibra" style="width: 2cm; height: 2cm; object-fit: contain;">
                </td>
            </tr>
        </table>
        <hr>
        <table class="sekolah">
            <tr>
                <td class="asal">
                    <h3>Asal Sekolah: {{ $edPeserta->name }}</h3>
                </td>
                <td class="urut">
                    <h3>No. Urut: {{ $peserta->no_urut }}</h3>
                </td>
            </tr>
        </table>
        @php
            $totalNilaiVariasi = 0;
            $totalNilaiFormasi = 0;
        @endphp
        <!-- Tabel Nilai Variasi -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-variasi">
                    <tr>
                        <th colspan="4 + {{ $juris->count() }}" class="fw-bold">Nilai Variasi</th>
                    </tr>
                    <tr>
                        <th style="width: 10%">No</th>
                        <th>Nama Aba-Aba/Penilaian</th>
                        @foreach ($juris as $juri)
                        <th style="width: 15%">Juri {{ $loop->iteration }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @if ($abaabaVariasis->count())
                    @foreach ($abaabaVariasis as $abaabaVariasi)
                    <tr>
                        <td class="text-center">{{ $abaabaVariasi->urutan_abaaba }}</td>
                        <td>{{ $abaabaVariasi->nama_abaaba }}</td>
                        @foreach ($juris as $juri)
                        @php
                        $filterNilai = $nilaivarfors->where('user_id', $juri->id)->where('abaaba_id', $abaabaVariasi->id)->first();
                        @endphp
                        <td class="text-center">{{ $filterNilai ? $filterNilai->points : '0' }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                    @endif
                    <tr>
                        <td colspan="2" class="text-center"><b>Jumlah</b></td>
                        @php
                        $totalPerJuri = [];
                        @endphp
                        @foreach ($juris as $juri)
                        @php
                        $sumNilai = $nilaivarfors
                            ->filter(function ($nilai) use ($juri, $abaabaVariasis) {
                                return $nilai->user_id == $juri->id && $abaabaVariasis->contains('id', $nilai->abaaba_id);
                            })
                            ->sum('points');
                        $totalPerJuri[] = $sumNilai;
                        @endphp
                        <td class="text-center"><b>{{ $sumNilai }}</b></td>
                        @endforeach
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><b>Total Nilai Variasi</b></td>
                        @php
                        $grandTotal = array_sum($totalPerJuri);
                        $totalNilaiVariasi += $grandTotal;
                        @endphp
                        <td colspan="{{ $juris->count() }}" class="text-center"><b>{{ $grandTotal }}</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Tabel Nilai Formasi -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-formasi">
                    <tr>
                        <th colspan="4 + {{ $juris->count() }}" class="fw-bold">Nilai Formasi</th>
                    </tr>
                    <tr>
                        <th style="width: 10%">No</th>
                        <th>Nama Aba-Aba/Penilaian</th>
                        @foreach ($juris as $juri)
                        <th style="width: 15%">Juri {{ $loop->iteration }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @if ($abaabaFormasis->count())
                    @foreach ($abaabaFormasis as $abaabaFormasi)
                    <tr>
                        <td class="text-center">{{ $abaabaFormasi->urutan_abaaba }}</td>
                        <td>{{ $abaabaFormasi->nama_abaaba }}</td>
                        @foreach ($juris as $juri)
                        @php
                        $filterNilai = $nilaivarfors->where('user_id', $juri->id)->where('abaaba_id', $abaabaFormasi->id)->first();
                        @endphp
                        <td class="text-center">{{ $filterNilai ? $filterNilai->points : '0' }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                    @endif
                    <tr>
                        <td colspan="2" class="text-center"><b>Jumlah</b></td>
                        @php
                        $totalPerJuri = [];
                        @endphp
                        @foreach ($juris as $juri)
                        @php
                        $sumNilai = $nilaivarfors
                            ->filter(function ($nilai) use ($juri, $abaabaFormasis) {
                                return $nilai->user_id == $juri->id && $abaabaFormasis->contains('id', $nilai->abaaba_id);
                            })
                            ->sum('points');
                        $totalPerJuri[] = $sumNilai;
                        @endphp
                        <td class="text-center"><b>{{ $sumNilai }}</b></td>
                        @endforeach
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><b>Total Nilai Formasi</b></td>
                        @php
                        $grandTotal = array_sum($totalPerJuri);
                        $totalNilaiFormasi += $grandTotal;
                        @endphp
                        <td colspan="{{ $juris->count() }}" class="text-center"><b>{{ $grandTotal }}</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Total Nilai Keseluruhan -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-total">
                    <tr>
                        <th>TOTAL NILAI VARIASI</th>
                        <th style="width: 30%" class="text-center">{{ $totalNilaiVariasi }}</th>
                    </tr>
                    <tr>
                        <th>TOTAL NILAI FORMASI</th>
                        <th style="width: 30%" class="text-center">{{ $totalNilaiFormasi }}</th>
                    </tr>
                    <tr>
                        <th>TOTAL NILAI VARFOR</th>
                        <th style="width: 30%" class="text-center">{{ $totalNilaiVariasi + $totalNilaiFormasi }}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </body>
</html>