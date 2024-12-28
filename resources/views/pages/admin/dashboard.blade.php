@extends('layouts.admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
    <div class="container-fluid px-4">
        {{-- Deteksi User Agent --}}
        @php
            $userAgent = request()->userAgent();
            $isMobile = strpos($userAgent, 'Mobile') !== false || 
                        strpos($userAgent, 'Android') !== false || 
                        strpos($userAgent, 'iPhone') !== false || 
                        strpos($userAgent, 'iPad') !== false;
        @endphp
        {{-- Tampilan untuk Mobile --}}
        @if($isMobile)
            <div class="text-center">
                <center>
                    <img src="{{ url('frontend/images/Logo LKBB.png') }}" alt="Gambar" style="width: 5cm;">
                </center>
                <br>
                <h4 class="text-center">
                    <p style="font-family: 'Times New Roman', Times, serif; font-size: 30px">SELAMAT DATANG DI</p>
                    <i style="font-family: 'Courier New', Courier, monospace">Sistem Informasi LKBB</i>
                </h4>
            </div>

        {{-- Tampilan untuk Desktop --}}
        @else
            <div class="d-flex justify-content-center align-items-center text-center">
                <center>
                    <img src="{{ url('frontend/images/Logo LKBB.png') }}" alt="Gambar" style="width: 5cm;">
                </center>
                <div class="ms-3">
                    <h4>
                        <p style="font-family: 'Times New Roman', Times, serif; font-size: 45px">SELAMAT DATANG DI</p>
                        <i style="font-family: 'Courier New', Courier, monospace">Sistem Informasi LKBB</i>
                    </h4>
                </div>
            </div>
        @endif
    </div>
</main>
@endsection