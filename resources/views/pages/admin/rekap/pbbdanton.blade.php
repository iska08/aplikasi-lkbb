@extends('layouts.admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="row align-items-center">
            <div class="col-sm-6 col-md-12">
                <h1 class="mt-4">{{ $title }}</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('rekap.index') }}">Rekap Nilai Peserta</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        <div class="card mb-4 bg-secondary">
            <div class="card-body">
                @php
                    $totalNilaiPBB = 0;
                    $totalNilaiDanton = 0;
                @endphp
                @foreach($jenisPBBs as $jenisPBB)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th colspan="4 + {{ $juris->count() }}" class="fw-bold bg-dark">{{ $jenisPBB->jenis_name }}</th>
                            </tr>
                            <tr>
                                <th rowspan="2" style="width: 5%">No</th>
                                <th rowspan="2">Nama Aba-Aba/Penilaian</th>
                                <th colspan="{{ $juris->count() }}" style="width: 20%">Nilai</th>
                            </tr>
                            <tr>
                                @foreach ($juris as $juri)
                                <th>Juri {{ $loop->iteration }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $filterAbaabaPBB = $abaabaPBBs->where('jenis_id', $jenisPBB->id);
                            @endphp
                            @if ($filterAbaabaPBB->count())
                                @foreach ($filterAbaabaPBB as $abaabaPBB)
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
                                <tr>
                                    <td colspan="2" class="text-center"><b>Jumlah</b></td>
                                    @php
                                        $totalPerJuri = [];
                                    @endphp
                                    @foreach ($juris as $juri)
                                        @php
                                            $sumNilai = $nilaipbbdantons
                                                ->where('user_id', $juri->id)
                                                ->whereIn('abaaba_id', $filterAbaabaPBB->pluck('id'))
                                                ->sum('points');
                                            $totalPerJuri[] = $sumNilai;
                                        @endphp
                                        <td class="text-center"><b>{{ $sumNilai }}</b></td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-center"><b>Total Nilai {{ $jenisPBB->jenis_name }}</b></td>
                                    @php
                                        $grandTotal = array_sum($totalPerJuri);
                                        $totalNilaiPBB += $grandTotal;
                                    @endphp
                                    <td colspan="{{ $juris->count() }}" class="text-center"><b>{{ $grandTotal }}</b></td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="3" class="text-danger text-center">
                                        <h4>Belum Ada Data Aba-Aba/Penilaian untuk {{ $jenisPBB->jenis_name }}</h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                @endforeach
                @foreach($jenisDantons as $jenisDanton)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th colspan="4 + {{ $juris->count() }}" class="fw-bold bg-dark">{{ $jenisDanton->jenis_name }}</th>
                            </tr>
                            <tr>
                                <th rowspan="2" style="width: 5%">No</th>
                                <th rowspan="2">Nama Aba-Aba/Penilaian</th>
                                <th colspan="{{ $juris->count() }}" style="width: 20%">Nilai</th>
                            </tr>
                            <tr>
                                @foreach ($juris as $juri)
                                <th>Juri {{ $loop->iteration }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $filterAbaabaDanton = $abaabaDantons->where('jenis_id', $jenisDanton->id);
                            @endphp
                            @if ($filterAbaabaDanton->count())
                                @foreach ($filterAbaabaDanton as $abaabaDanton)
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
                                <tr>
                                    <td colspan="2" class="text-center"><b>Jumlah</b></td>
                                    @php
                                        $totalPerJuri = [];
                                    @endphp
                                    @foreach ($juris as $juri)
                                        @php
                                            $sumNilai = $nilaipbbdantons
                                                ->where('user_id', $juri->id)
                                                ->whereIn('abaaba_id', $filterAbaabaDanton->pluck('id'))
                                                ->sum('points');
                                            $totalPerJuri[] = $sumNilai;
                                        @endphp
                                        <td class="text-center"><b>{{ $sumNilai }}</b></td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-center"><b>Total Nilai {{ $jenisDanton->jenis_name }}</b></td>
                                    @php
                                        $grandTotal = array_sum($totalPerJuri);
                                        $totalNilaiDanton += $grandTotal;
                                    @endphp
                                    <td colspan="{{ $juris->count() }}" class="text-center"><b>{{ $grandTotal }}</b></td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="3" class="text-danger text-center">
                                        <h4>Belum Ada Data Aba-Aba/Penilaian untuk {{ $jenisDanton->jenis_name }}</h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                @endforeach
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th>TOTAL NILAI PBB</th>
                                <th style="width: 20%" class="text-center">{{ $totalNilaiPBB }}</th>
                            </tr>
                            <tr>
                                <th>TOTAL NILAI DANTON</th>
                                <th style="width: 20%" class="text-center">{{ $totalNilaiDanton }}</th>
                            </tr>
                            <tr>
                                <th>TOTAL NILAI PERINGKAT</th>
                                <th style="width: 20%" class="text-center">{{ $totalNilaiPBB + $totalNilaiDanton }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="mb-3 text-center">
                    <a href="{{ route('rekap.pbbdanton.pbbDantonPdf', $id) }}" class="btn btn-dark me-2" target="_blank">
                        Download Nilai
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection