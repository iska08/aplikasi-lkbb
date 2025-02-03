@extends('layouts.admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="row align-items-center">
            <div class="col-sm-6 col-md-12">
                <h1 class="mt-4">{{ $title }}</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        <div class="card mb-4 bg-secondary">
            <div class="card-body">
                @php
                    $totalNilaiPBB = 0;
                    $totalNilaiDanton = 0;
                    $totalNilaiVariasi = 0;
                    $totalNilaiFormasi = 0;
                @endphp
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th colspan="4 + {{ $juriPDs->count() }}" class="fw-bold bg-dark">Nilai PBB</th>
                            </tr>
                            <tr>
                                <th rowspan="2" style="width: 8%">No</th>
                                <th rowspan="2">Nama Aba-Aba/Penilaian</th>
                                <th colspan="{{ $juriPDs->count() }}" style="width: 30%">Nilai</th>
                            </tr>
                            <tr>
                                @foreach ($juriPDs as $juriPD)
                                <th>Juri {{ $loop->iteration }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @if ($abaabaPBBs->count())
                            @foreach ($abaabaPBBs as $abaabaPBB)
                            <tr>
                                <td class="text-center">{{ $abaabaPBB->urutan_abaaba }}</td>
                                <td>{{ $abaabaPBB->nama_abaaba }}</td>
                                @foreach ($juriPDs as $juriPD)
                                @php
                                    $filterNilai = $nilaipbbdantons->where('user_id', $juriPD->id)->where('abaaba_id', $abaabaPBB->id)->first();
                                @endphp
                                <td class="text-center">{{ $filterNilai ? $filterNilai->points : '0' }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" class="text-center"><b>Jumlah</b></td>
                                @php
                                    $totalPerjuriPD = [];
                                @endphp
                                @foreach ($juriPDs as $juriPD)
                                    @php
                                        $sumNilai = $nilaipbbdantons
                                            ->where('user_id', $juriPD->id)
                                            ->whereIn('abaaba_id', $abaabaPBBs->pluck('id'))
                                            ->sum('points');
                                        $totalPerjuriPD[] = $sumNilai;
                                    @endphp
                                    <td class="text-center"><b>{{ $sumNilai }}</b></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center"><b>Total Nilai</b></td>
                                @php
                                    $grandTotal = array_sum($totalPerjuriPD);
                                    $totalNilaiPBB += $grandTotal;
                                @endphp
                                <td colspan="{{ $juriPDs->count() }}" class="text-center"><b>{{ $grandTotal }}</b></td>
                            </tr>
                            @else
                            <tr>
                                <td colspan="3" class="text-danger text-center">
                                    <h4>Belum Ada Data Aba-Aba/Penilaian untuk PBB</h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th colspan="4 + {{ $juriPDs->count() }}" class="fw-bold bg-dark">Nilai Danton</th>
                            </tr>
                            <tr>
                                <th rowspan="2" style="width: 8%">No</th>
                                <th rowspan="2">Nama Aba-Aba/Penilaian</th>
                                <th colspan="{{ $juriPDs->count() }}" style="width: 30%">Nilai</th>
                            </tr>
                            <tr>
                                @foreach ($juriPDs as $juriPD)
                                <th>Juri {{ $loop->iteration }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @if ($abaabaDantons->count())
                            @foreach ($abaabaDantons as $abaabaDanton)
                            <tr>
                                <td class="text-center">{{ $abaabaDanton->urutan_abaaba }}</td>
                                <td>{{ $abaabaDanton->nama_abaaba }}</td>
                                @foreach ($juriPDs as $juriPD)
                                @php
                                    $filterNilai = $nilaipbbdantons->where('user_id', $juriPD->id)->where('abaaba_id', $abaabaDanton->id)->first();
                                @endphp
                                <td class="text-center">{{ $filterNilai ? $filterNilai->points : '0' }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" class="text-center"><b>Jumlah</b></td>
                                @php
                                    $totalPerjuriPD = [];
                                @endphp
                                @foreach ($juriPDs as $juriPD)
                                    @php
                                        $sumNilai = $nilaipbbdantons
                                            ->where('user_id', $juriPD->id)
                                            ->whereIn('abaaba_id', $abaabaDantons->pluck('id'))
                                            ->sum('points');
                                        $totalPerjuriPD[] = $sumNilai;
                                    @endphp
                                    <td class="text-center"><b>{{ $sumNilai }}</b></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center"><b>Total Nilai Danton</b></td>
                                @php
                                    $grandTotal = array_sum($totalPerjuriPD);
                                    $totalNilaiDanton += $grandTotal;
                                @endphp
                                <td colspan="{{ $juriPDs->count() }}" class="text-center"><b>{{ $grandTotal }}</b></td>
                            </tr>
                            @else
                            <tr>
                                <td colspan="3" class="text-danger text-center">
                                    <h4>Belum Ada Data Aba-Aba/Penilaian untuk Danton</h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th colspan="4 + {{ $juriVFs->count() }}" class="fw-bold bg-dark">Nilai Variasi</th>
                            </tr>
                            <tr>
                                <th rowspan="2" style="width: 8%">No</th>
                                <th rowspan="2">Nama Aba-Aba/Penilaian</th>
                                <th colspan="{{ $juriVFs->count() }}" style="width: 30%">Nilai</th>
                            </tr>
                            <tr>
                                @foreach ($juriVFs as $juriVF)
                                <th>Juri {{ $loop->iteration }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @if ($abaabaVariasis->count())
                            @foreach ($abaabaVariasis as $abaabaVariasi)
                            <tr>
                                <td class="text-center">{{ $abaabaVariasi->urutan_abaaba }}</td>
                                <td>{{ $abaabaVariasi->nama_abaaba }}</td>
                                @foreach ($juriVFs as $juriVF)
                                @php
                                    $filterNilai = $nilaivarfors->where('user_id', $juriVF->id)->where('abaaba_id', $abaabaVariasi->id)->first();
                                @endphp
                                <td class="text-center">{{ $filterNilai ? $filterNilai->points : '0' }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" class="text-center"><b>Jumlah</b></td>
                                @php
                                    $totalPerJuri = [];
                                @endphp
                                @foreach ($juriVFs as $juriVF)
                                    @php
                                        $sumNilai = $nilaivarfors
                                            ->where('user_id', $juriVF->id)
                                            ->whereIn('abaaba_id', $abaabaVariasis->pluck('id'))
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
                                <td colspan="{{ $juriVFs->count() }}" class="text-center"><b>{{ $grandTotal }}</b></td>
                            </tr>
                            @else
                            <tr>
                                <td colspan="3" class="text-danger text-center">
                                    <h4>Belum Ada Data Aba-Aba/Penilaian untuk Variasi</h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th colspan="4 + {{ $juriVFs->count() }}" class="fw-bold bg-dark">Nilai Formasi</th>
                            </tr>
                            <tr>
                                <th rowspan="2" style="width: 8%">No</th>
                                <th rowspan="2">Nama Aba-Aba/Penilaian</th>
                                <th colspan="{{ $juriVFs->count() }}" style="width: 30%">Nilai</th>
                            </tr>
                            <tr>
                                @foreach ($juriVFs as $juriVF)
                                <th>Juri {{ $loop->iteration }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @if ($abaabaFormasis->count())
                            @foreach ($abaabaFormasis as $abaabaFormasi)
                            <tr>
                                <td class="text-center">{{ $abaabaFormasi->urutan_abaaba }}</td>
                                <td>{{ $abaabaFormasi->nama_abaaba }}</td>
                                @foreach ($juriVFs as $juriVF)
                                @php
                                    $filterNilai = $nilaivarfors->where('user_id', $juriVF->id)->where('abaaba_id', $abaabaFormasi->id)->first();
                                @endphp
                                <td class="text-center">{{ $filterNilai ? $filterNilai->points : '0' }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" class="text-center"><b>Jumlah</b></td>
                                @php
                                    $totalPerJuri = [];
                                @endphp
                                @foreach ($juriVFs as $juriVF)
                                    @php
                                        $sumNilai = $nilaivarfors
                                            ->where('user_id', $juriVF->id)
                                            ->whereIn('abaaba_id', $abaabaFormasis->pluck('id'))
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
                                <td colspan="{{ $juriVFs->count() }}" class="text-center"><b>{{ $grandTotal }}</b></td>
                            </tr>
                            @else
                            <tr>
                                <td colspan="3" class="text-danger text-center">
                                    <h4>Belum Ada Data Aba-Aba/Penilaian untuk Formasi</h4>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th>TOTAL NILAI PBB</th>
                                <th style="width: 30%" class="text-center">{{ $totalNilaiPBB }}</th>
                            </tr>
                            <tr>
                                <th>TOTAL NILAI DANTON</th>
                                <th style="width: 30%" class="text-center">{{ $totalNilaiDanton }}</th>
                            </tr>
                            <tr>
                                <th>TOTAL NILAI VARIASI</th>
                                <th style="width: 30%" class="text-center">{{ $totalNilaiVariasi }}</th>
                            </tr>
                            <tr>
                                <th>TOTAL NILAI FORMASI</th>
                                <th style="width: 30%" class="text-center">{{ $totalNilaiFormasi }}</th>
                            </tr>
                            @php
                            $totalMinusPoin = 0;
                            @endphp
                            @if ($pengurangans->count())
                            @foreach ($pengurangans as $pengurangan)
                            @php
                            $total = $pengurangan->poin * $pengurangan->jumlah;
                            $totalMinusPoin += $total;
                            @endphp
                            @endforeach
                            @endif
                            <tr>
                                <th>PENGURANGAN NILAI</th>
                                <th style="width: 20%" class="text-center">
                                    @if ($totalMinusPoin == 0)
                                    {{ $totalMinusPoin }}
                                    @else
                                    -{{ $totalMinusPoin }}
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th>TOTAL NILAI UTAMA</th>
                                @php
                                $totalNilaiUtama = $totalNilaiPBB + $totalNilaiDanton;
                                $nilaiPeringkatFiks = $totalNilaiUtama - $totalMinusPoin;
                                @endphp
                                <th style="width: 30%" class="text-center">{{ $totalNilaiPBB }} + {{ $totalNilaiDanton }} - {{ $totalMinusPoin }} = {{ $nilaiPeringkatFiks }}</th>
                            </tr>
                            <tr>
                                <th>TOTAL NILAI UMUM</th>
                                @php
                                $totalNilaiUmum = $nilaiPeringkatFiks + $totalNilaiVariasi + $totalNilaiFormasi;
                                @endphp
                                <th style="width: 30%" class="text-center">{{ $nilaiPeringkatFiks }} + {{ $totalNilaiVariasi }} + {{ $totalNilaiFormasi }} = {{ $totalNilaiUmum }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="mb-3 text-center">
                    <a href="{{ route('rekap.nilaipeserta') }}" class="btn btn-dark me-2" target="_blank">
                        Download Nilai
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection