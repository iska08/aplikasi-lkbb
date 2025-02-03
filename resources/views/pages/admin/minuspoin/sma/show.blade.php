@extends('layouts.admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="row align-items-center">
            <div class="col-sm-6 col-md-12">
                <h1 class="mt-4">{{ $title }}</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('minus-poin-sma.index') }}">Data Pengurangan Nilai</a></li>
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
                                <th style="width: 5%">No</th>
                                <th>Keterangan</th>
                                <th>Minus Poin</th>
                                <th>Jumlah</th>
                                <th>Pengurangan Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalKeseluruhan = 0;
                            @endphp
                            @if ($pengurangans->count())
                            @foreach ($pengurangans as $pengurangan)
                            @php
                            $total = $pengurangan->poin * $pengurangan->jumlah;
                            $totalKeseluruhan += $total;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $pengurangan->keterangan }}</td>
                                @if ($pengurangan->per == "" || $pengurangan->per == "-")
                                <td class="text-center">-{{ $pengurangan->poin }}</td>
                                @else
                                <td class="text-center">-{{ $pengurangan->poin }} per {{ $pengurangan->per }}</td>
                                @endif
                                <td class="text-center">{{ $pengurangan->jumlah }}</td>
                                @if ($total == 0)
                                <td class="text-center">{{ $total }}</td>
                                @else
                                <td class="text-center">-{{ $total }}</td>
                                @endif
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-center"><strong>Total Pengurangan Nilai</strong></td>
                                <td class="text-center">
                                    <strong>
                                        @if ($totalKeseluruhan == 0)
                                        {{ $totalKeseluruhan }}
                                        @else
                                        -{{ $totalKeseluruhan }}
                                        @endif
                                    </strong>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td colspan="5" class="text-danger text-center">
                                    <h4>Belum Ada Detail Pengurangan Nilai</h4>
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