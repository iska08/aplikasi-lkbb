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
                <br>
                @if($tingkatans->count())
                    <div class="container">
                        @foreach ($tingkatans->chunk(3) as $chunk)
                            {{-- Baris baru setiap 2 item --}}
                            <div class="row justify-content-center mb-4">
                                @foreach ($chunk as $tingkatan)
                                    <div class="col-lg-3 col-md-4 d-flex justify-content-center mb-3" data-aos="zoom-out" data-aos-delay="400">
                                        <div class="service-item position-relative text-center">
                                            <br>
                                            <div class="icon">
                                                <a href="{{ route('aba-aba.show', $tingkatan->slug) }}">
                                                    <i class="bi-clipboard-check-fill"></i>
                                                </a>
                                            </div>
                                            <h4>
                                                <a href="{{ route('aba-aba.show', $tingkatan->slug) }}">
                                                    Aba-aba {{ $tingkatan->nama_tingkatan }}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center text-danger">Belum ada data tingkatan.</p>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection