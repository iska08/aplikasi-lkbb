@extends('layouts.portal')
@section('title')
Portal
@endsection
@section('content')
<div class="portal1">
    <main class="portal2">
        <!-- home -->
        <section id="home" class="home d-flex align-items-center">
            <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
                <img src="{{ url('frontend/images/Logo LKBB.png') }}" class="img-fluid animated" alt="Logo LKBB" style="max-width: 7cm;" />
                <h3 style="margin-top: -40px;">
                @if ($tingkatans->count())
                @foreach ($tingkatans as $tingkatan)
                {{ $tingkatan->nama_tingkatan }} 
                @if (!$loop->last)
                    & 
                @endif
                @endforeach
                @else
                Belum Ada Data
                @endif
                </h3>
                <br><br>
                <h4 style="margin-top: -40px;">
                    {{ $details->cakupan ?? 'Cakupan Belum Tersedia' }}
                </h4>
                <br>
                <p class="text-white">
                    {{ $details->keterangan_lkbb ?? 'Keterangan Belum Tersedia' }}
                </p>
            </div>
        </section>
        <!-- waktutempat -->
        <section id="waktutempat" class="waktutempat">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Waktu dan Tempat Pelaksanaan</h2>
                </div>
                <div class="row g-4 g-lg-5 align-items-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-lg-5">
                        <div class="waktutempat-img">
                            <img src="{{ url('frontend/images/Time & Location.png') }}" class="img-fluid" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <div class="d-flex align-items-center mt-4">
                                    <h4>PENDAFTARAN</h4>
                                </div>
                                <p>
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>
                                        @if($timelines && $timelines->tgl_pendaftaran_buka && $timelines->tgl_pendaftaran_tutup)
                                            {{ \Carbon\Carbon::parse($timelines->tgl_pendaftaran_buka)->translatedFormat('d F Y') }} - 
                                            {{ \Carbon\Carbon::parse($timelines->tgl_pendaftaran_tutup)->translatedFormat('d F Y') }}
                                        @else
                                            Jadwal Pendaftaran Belum Tersedia
                                        @endif
                                    </span>
                                </p>
                                <p>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>
                                        {{ $timelines->lokasi_pendaftaran ?? 'Lokasi Pendaftaran Belum Tersedia' }}
                                    </span>
                                </p>
                                <div class="d-flex align-items-center mt-4">
                                    <h4>TECHNICAL MEETING</h4>
                                </div>
                                <p>
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>
                                        @if($timelines && $timelines->tgl_tm)
                                            {{ \Carbon\Carbon::parse($timelines->tgl_tm)->translatedFormat('d F Y') }}
                                        @else
                                            Jadwal TM Belum Tersedia
                                        @endif
                                    </span>
                                </p>
                                <p>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>
                                        {{ $timelines->lokasi_tm ?? 'Lokasi TM Belum Tersedia' }}
                                    </span>
                                </p>
                                <div class="d-flex align-items-center mt-4">
                                    <h4>PELAKSANAAN</h4>
                                </div>
                                <p>
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>
                                        @if($timelines && $timelines->tgl_pelaksanaan)
                                            {{ \Carbon\Carbon::parse($timelines->tgl_pelaksanaan)->translatedFormat('d F Y') }}
                                        @else
                                            Jadwal TM Belum Tersedia
                                        @endif
                                    </span>
                                </p>
                                <p>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>
                                        {{ $timelines->lokasi_pelaksanaan ?? 'Lokasi Pelaksanaan Belum Tersedia' }}
                                    </span>
                                </p>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- berkas -->
        <section id="berkas" class="berkas">
            <div class="container">
                <div class="section-header">
                    <h2>Berkas Administrasi</h2>
                </div>
                <div class="row d-flex justify-content-center text-center">
                    @if($berkas && $berkas->poster)
                    <div class="col-xl-3 col-md-6 mb-4" data-aos="zoom-out">
                        <div class="service-item position-relative">
                            <br>
                            <div class="icon">
                                <a href="{{ $berkas->poster }}" target="_blank">
                                    <i class="bi-file-earmark-image"></i>
                                </a>
                            </div>
                            <h4>
                                <a href="{{ $berkas->poster }}" target="_blank">Unduh Poster</a>
                            </h4>
                        </div>
                    </div>
                    @endif
                    @if($berkas && $berkas->rekom)
                    <div class="col-xl-3 col-md-6 mb-4" data-aos="zoom-out" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <br>
                            <div class="icon">
                                <a href="{{ $berkas->rekom }}" target="_blank">
                                    <i class="bi-file-earmark-pdf"></i>
                                </a>
                            </div>
                            <h4>
                                <a href="{{ $berkas->rekom }}" target="_blank">Unduh Surat Rekomendasi</a>
                            </h4>
                        </div>
                    </div>
                    @endif
                    @if($berkas && $berkas->juknis)
                    <div class="col-xl-3 col-md-6 mb-4" data-aos="zoom-out" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <br>
                            <div class="icon">
                                <a href="{{ $berkas->juknis }}" target="_blank">
                                    <i class="bi-file-earmark-pdf"></i>
                                </a>
                            </div>
                            <h4>
                                <a href="{{ $berkas->juknis }}" target="_blank">Unduh Juknis</a>
                            </h4>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- section trophy -->
        <section id="trophy" class="trophy">
            <div class="container">
                <div class="section-header">
                    <h2>Trophy</h2>
                </div>
                @if ($tingkatans->count())
                    @foreach ($tingkatans as $tingkatan)
                    <div class="table-responsive">
                        <table class="table table-bordered text-white table-centered">
                            <thead class="text-center">
                                <tr>
                                    <td colspan="4">
                                        <h3>Tingkat {{ $tingkatan->nama_tingkatan }}</h3>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $filterBenefit = $benefits->where('tingkatan_id', '=', $tingkatan->id);
                                @endphp
                                @if ($filterBenefit->count())
                                @foreach ($filterBenefit as $benefit)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $benefit->nama_juara }}</td>
                                    <td>:</td>
                                    <td>
                                        @if($benefit->hadiah == "Tidak Ada")
                                            {{ $benefit->trophy }}
                                        @elseif($benefit->uang == "0")
                                            {{ $benefit->trophy }} + {{ $benefit->hadiah }}
                                        @else
                                            {{ $benefit->trophy }} + {{ $benefit->hadiah }} + Rp {{ number_format($benefit->uang, 0, ',', '.') }}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="no-trophy" colspan="4">
                                        Tidak ada data trophy untuk {{ $tingkatan->nama_tingkatan }}
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <br>
                    @endforeach
                @endif
            </div>
        </section>
        <section id="contact-info" class="contact-info-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 d-flex align-items-start">
                        @if (!empty($details->maps))
                        <a href="{{ $details->maps }}" target="_blank">
                            <img src="{{ url('frontend/images/Location.png') }}" alt="Logo Lokasi" class="lokasi-logo me-3">
                        </a>
                        @endif
                        <div>
                            <h4>Alamat</h4>
                            <p>{{ $details->alamat ?? 'Alamat Belum Tersedia.' }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 text-center text-md-start">
                        <h4>Contact Person</h4>
                        @if ($cps && $cps->count())
                        <div class="d-flex flex-wrap">
                            @foreach ($cps as $cp)
                            <a href="https://wa.me/{{ preg_replace('/^0/', '62', $cp->noHp) }}" target="_blank" class="text-decoration-none mx-2">
                                <div class="text-center" style="width: 2cm">
                                    @if ($cp->peran == 'AKUN')
                                        <i class="fas fa-user fa-2x text-dark"></i>
                                    @elseif ($cp->peran == 'PENDAFTARAN')
                                        <i class="fas fa-clipboard fa-2x text-dark"></i>
                                    @elseif ($cp->peran == 'JUKNIS')
                                        <i class="fas fa-book fa-2x text-dark"></i>
                                    @elseif ($cp->peran == 'BAZAR')
                                        <i class="fas fa-store fa-2x text-dark"></i>
                                    @elseif ($cp->peran == 'PENGINAPAN')
                                        <i class="fas fa-bed fa-2x text-dark"></i>
                                    @else
                                        <i class="fas fa-info-circle fa-2x text-dark"></i> <!-- Default icon -->
                                    @endif
                                    <div style="font-size: 12px;">{{ $cp->peran }}</div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        @else
                        <p>Contact Person Belum Tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection