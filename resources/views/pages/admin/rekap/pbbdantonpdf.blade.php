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
            .thead-pbb th {
                background-color: #CCFF99;
                color: #000;
                border-bottom: 2px solid #000;
            }
            .thead-danton th {
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
            $totalNilaiPBB = 0;
            $totalNilaiDanton = 0;
        @endphp
        <!-- Tabel Nilai PBB -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-pbb">
                    <tr>
                        <th colspan="4 + {{ $juris->count() }}" class="fw-bold">Nilai PBB</th>
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
                    @if ($abaabaPBBs->count())
                    @foreach ($abaabaPBBs as $abaabaPBB)
                    <tr>
                        <td class="text-center">{{ $abaabaPBB->urutan_abaaba }}</td>
                        <td>{{ $abaabaPBB->nama_abaaba }}</td>
                        @foreach ($juris as $juri)
                        @php
                        $filterNilai = $nilaipbbdantons->where('user_id', $juri->id)->where('abaaba_id', $abaabaPBB->id)->first();
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
                        $sumNilai = $nilaipbbdantons
                            ->filter(function ($nilai) use ($juri, $abaabaPBBs) {
                                return $nilai->user_id == $juri->id && $abaabaPBBs->contains('id', $nilai->abaaba_id);
                            })
                            ->sum('points');
                        $totalPerJuri[] = $sumNilai;
                        @endphp
                        <td class="text-center"><b>{{ $sumNilai }}</b></td>
                        @endforeach
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><b>Total Nilai PBB</b></td>
                        @php
                        $grandTotal = array_sum($totalPerJuri);
                        $totalNilaiPBB += $grandTotal;
                        @endphp
                        <td colspan="{{ $juris->count() }}" class="text-center"><b>{{ $grandTotal }}</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Tabel Nilai Danton -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-danton">
                    <tr>
                        <th colspan="4 + {{ $juris->count() }}" class="fw-bold">Nilai Danton</th>
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
                    @if ($abaabaDantons->count())
                    @foreach ($abaabaDantons as $abaabaDanton)
                    <tr>
                        <td class="text-center">{{ $abaabaDanton->urutan_abaaba }}</td>
                        <td>{{ $abaabaDanton->nama_abaaba }}</td>
                        @foreach ($juris as $juri)
                        @php
                        $filterNilai = $nilaipbbdantons->where('user_id', $juri->id)->where('abaaba_id', $abaabaDanton->id)->first();
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
                        $sumNilai = $nilaipbbdantons
                            ->filter(function ($nilai) use ($juri, $abaabaDantons) {
                                return $nilai->user_id == $juri->id && $abaabaDantons->contains('id', $nilai->abaaba_id);
                            })
                            ->sum('points');
                        $totalPerJuri[] = $sumNilai;
                        @endphp
                        <td class="text-center"><b>{{ $sumNilai }}</b></td>
                        @endforeach
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><b>Total Nilai Danton</b></td>
                        @php
                        $grandTotal = array_sum($totalPerJuri);
                        $totalNilaiDanton += $grandTotal;
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
                        <th>TOTAL NILAI PBB</th>
                        <th style="width: 30%" class="text-center">{{ $totalNilaiPBB }}</th>
                    </tr>
                    <tr>
                        <th>TOTAL NILAI DANTON</th>
                        <th style="width: 30%" class="text-center">{{ $totalNilaiDanton }}</th>
                    </tr>
                    <tr>
                        <th>TOTAL NILAI PERINGKAT</th>
                        <th style="width: 30%" class="text-center">{{ $totalNilaiPBB + $totalNilaiDanton }}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </body>
</html>