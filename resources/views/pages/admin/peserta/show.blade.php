@extends('layouts.admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="row align-items-center">
            <div class="col-sm-6 col-md-12">
                <h1 class="mt-4">{{ $title }}</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('peserta.index') }}">Data Peserta</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        {{-- datatable --}}
        <div class="card mb-4 bg-secondary">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 4cm">Foto</th>
                                <th>Nama</th>
                                <th style="width: 10%">Kelas</th>
                                <th style="width: 10%">NIS</th>
                                <th style="width: 10%">Posisi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($pesertas->count())
                            @foreach ($pesertas as $peserta)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($peserta->foto_anggota == "" || $peserta->foto_anggota == "-")
                                        <img src="{{ url('frontend/images/Contoh Foto Pleton.jpg') }}" alt="Gambar" style="width: 3cm; height: 4cm;">
                                    @else
                                        <img src="{{ asset('storage/' . $peserta->foto_anggota) }}" alt="Gambar" style="width: 3cm; height: 4cm;">
                                    @endif
                                </td>
                                <td>{{ $peserta->nama_anggota }}</td>
                                <td>{{ $peserta->kelas_anggota }}</td>
                                <td>{{ $peserta->nis_anggota }}</td>
                                <td>{{ $peserta->nama_posisi }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="7" class="text-danger text-center">
                                    <h4>Belum Ada Anggota Pleton yang Dibuat</h4>
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