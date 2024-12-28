@extends('layouts.admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="row align-items-center">
            <div class="col-sm-6 col-md-12">
                <h1 class="mt-4">{{ $title }}</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('variasi-formasi-sd.index') }}">Data Nilai Variasi dan Formasi</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        @if (auth()->user()->level === '3JURIVARFOR')
        <div class="card mb-4 bg-secondary">
            <div class="card-body">
                @foreach($jenisVariasis as $jenisVariasi)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th colspan="3" class="fw-bold bg-dark">{{ $jenisVariasi->jenis_name }}</th>
                            </tr>
                            <tr>
                                <th style="width: 10%">No</th>
                                <th>Nama Aba-Aba/Penilaian</th>
                                <th style="width: 10%">Nilai</th>
                            </tr>
                            <tr>
                        </thead>
                        <tbody>
                            @php
                                $filterAbaabaVariasi = $abaabaVariasis->where('jenis_id', $jenisVariasi->id);
                            @endphp
                            @if ($filterAbaabaVariasi->count())
                                @foreach ($filterAbaabaVariasi as $abaabaVariasi)
                                <tr>
                                    <td class="text-center">{{ $abaabaVariasi->urutan_abaaba }}</td>
                                    <td>{{ $abaabaVariasi->nama_abaaba }}</td>
                                    @php
                                        $filterNilai = $nilaivarfors->where('user_id', auth()->user()->id)->where('abaaba_id', $abaabaVariasi->id)->first();
                                    @endphp
                                    <td class="text-center">{{ $filterNilai ? $filterNilai->points : '0' }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-danger text-center">
                                        <h4>Belum Ada Data Aba-Aba/Penilaian untuk {{ $jenisVariasi->jenis_name }}</h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                @endforeach
                @foreach($jenisFormasis as $jenisFormasi)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th colspan="3" class="fw-bold bg-dark">{{ $jenisFormasi->jenis_name }}</th>
                            </tr>
                            <tr>
                                <th style="width: 10%">No</th>
                                <th>Nama Aba-Aba/Penilaian</th>
                                <th style="width: 10%">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $filterAbaabaFormasi = $abaabaFormasis->where('jenis_id', $jenisFormasi->id);
                            @endphp
                            @if ($filterAbaabaFormasi->count())
                                @foreach ($filterAbaabaFormasi as $abaabaFormasi)
                                <tr>
                                    <td class="text-center">{{ $abaabaFormasi->urutan_abaaba }}</td>
                                    <td>{{ $abaabaFormasi->nama_abaaba }}</td>
                                    @php
                                        $filterNilai = $nilaivarfors->where('user_id', auth()->user()->id)->where('abaaba_id', $abaabaFormasi->id)->first();
                                    @endphp
                                    <td class="text-center">{{ $filterNilai ? $filterNilai->points : '0' }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-danger text-center">
                                        <h4>Belum Ada Data Aba-Aba/Penilaian untuk {{ $jenisFormasi->jenis_name }}</h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="card mb-4 bg-secondary">
            <div class="card-body">
                @php
                    $totalNilaiVariasi = 0;
                    $totalNilaiFormasi = 0;
                @endphp
                @foreach($jenisVariasis as $jenisVariasi)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th colspan="4 + {{ $juris->count() }}" class="fw-bold bg-dark">{{ $jenisVariasi->jenis_name }}</th>
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
                                $filterAbaabaVariasi = $abaabaVariasis->where('jenis_id', $jenisVariasi->id);
                            @endphp
                            @if ($filterAbaabaVariasi->count())
                                @foreach ($filterAbaabaVariasi as $abaabaVariasi)
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
                                <tr>
                                    <td colspan="2" class="text-center"><b>Jumlah</b></td>
                                    @php
                                        $totalPerJuri = [];
                                    @endphp
                                    @foreach ($juris as $juri)
                                        @php
                                            $sumNilai = $nilaivarfors
                                                ->where('user_id', $juri->id)
                                                ->whereIn('abaaba_id', $filterAbaabaVariasi->pluck('id'))
                                                ->sum('points');
                                            $totalPerJuri[] = $sumNilai;
                                        @endphp
                                        <td class="text-center"><b>{{ $sumNilai }}</b></td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-center"><b>Total Nilai {{ $jenisVariasi->jenis_name }}</b></td>
                                    @php
                                        $grandTotal = array_sum($totalPerJuri);
                                        $totalNilaiVariasi += $grandTotal;
                                    @endphp
                                    <td colspan="{{ $juris->count() }}" class="text-center"><b>{{ $grandTotal }}</b></td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="4" class="text-danger text-center">
                                        <h4>Belum Ada Data Aba-Aba/Penilaian untuk {{ $jenisVariasi->jenis_name }}</h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                @endforeach
                @foreach($jenisFormasis as $jenisFormasi)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th colspan="4 + {{ $juris->count() }}" class="fw-bold bg-dark">{{ $jenisFormasi->jenis_name }}</th>
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
                                $filterAbaabaFormasi = $abaabaFormasis->where('jenis_id', $jenisFormasi->id);
                            @endphp
                            @if ($filterAbaabaFormasi->count())
                                @foreach ($filterAbaabaFormasi as $abaabaFormasi)
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
                                <tr>
                                    <td colspan="2" class="text-center"><b>Jumlah</b></td>
                                    @php
                                        $totalPerJuri = [];
                                    @endphp
                                    @foreach ($juris as $juri)
                                        @php
                                            $sumNilai = $nilaivarfors
                                                ->where('user_id', $juri->id)
                                                ->whereIn('abaaba_id', $filterAbaabaFormasi->pluck('id'))
                                                ->sum('points');
                                            $totalPerJuri[] = $sumNilai;
                                        @endphp
                                        <td class="text-center"><b>{{ $sumNilai }}</b></td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-center"><b>Total Nilai {{ $jenisFormasi->jenis_name }}</b></td>
                                    @php
                                        $grandTotal = array_sum($totalPerJuri);
                                        $totalNilaiFormasi += $grandTotal;
                                    @endphp
                                    <td colspan="{{ $juris->count() }}" class="text-center"><b>{{ $grandTotal }}</b></td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="4" class="text-danger text-center">
                                        <h4>Belum Ada Data Aba-Aba/Penilaian untuk {{ $jenisFormasi->jenis_name }}</h4>
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
                                <th>TOTAL NILAI VARIASI</th>
                                <th style="width: 20%" class="text-center">{{ $totalNilaiVariasi }}</th>
                            </tr>
                            <tr>
                                <th>TOTAL NILAI FORMASI</th>
                                <th style="width: 20%" class="text-center">{{ $totalNilaiFormasi }}</th>
                            </tr>
                            <tr>
                                <th>TOTAL NILAI VARFOR</th>
                                <th style="width: 20%" class="text-center">{{ $totalNilaiVariasi + $totalNilaiFormasi }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
</main>
@endsection