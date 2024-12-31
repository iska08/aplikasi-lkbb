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
                <h4 class="text-center" style="font-size: 30px">{{ $title }}</h4>
                @if ($tingkatans->count())
                @foreach ($tingkatans as $tingkatan)
                <h4 class="text-center" style="font-size: 20px">Rekap Akhir {{ $tingkatan->nama_tingkatan }}</h4>
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="service-item position-relative">
                            <br>
                            <div class="icon">
                                <a href="{{ route('rekap.rekapnilaiakhir', $tingkatan->id) }}">
                                    <i class="bi-clipboard-check-fill"></i>
                                </a>
                            </div>
                            <h4>
                                <a href="{{ route('rekap.rekapnilaiakhir', $tingkatan->id) }}">Rekap PBB & Danton</a>
                            </h4>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</main>
@endsection