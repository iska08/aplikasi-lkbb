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
                @if($details->count() === 0)
                <a href="{{ route('detail.create') }}" type="button" class="btn btn-dark mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Detail LKBB
                </a>
                @endif
                <br>
                <form action="{{ route('detail.updateSetting') }}" method="POST" class="btn btn-dark mb-3">
                    @csrf
                    <label for="rekap_nilai_akhir_peserta">Aktifkan Rekap Nilai Akhir:</label>
                    <select name="rekap_nilai_akhir_peserta" id="rekap_nilai_akhir_peserta" class="form-control">
                        <option value="on" {{ \App\Models\Setting::get('rekap_nilai_akhir_peserta') === 'on' ? 'selected' : '' }}>On</option>
                        <option value="off" {{ \App\Models\Setting::get('rekap_nilai_akhir_peserta') === 'off' ? 'selected' : '' }}>Off</option>
                    </select>
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Cakupan LKBB</th>
                                <th>Alamat Penyelenggara</th>
                                <th>Link Google Maps</th>
                                <th>Keterangan</th>
                                <th>Total Uang Pembinaan</th>
                                <th>HTM</th>
                                <th style="width: 8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($details->count())
                            @foreach ($details as $detail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $detail->cakupan }}</td>
                                <td>{{ $detail->alamat }}</td>
                                <td>
                                    <a href="{{ $detail->maps }}" target="_blank">Klik di Sini</a>
                                </td>
                                <td>{{ $detail->keterangan_lkbb }}</td>
                                <td>Rp {{ number_format($detail->total_pembinaan, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($detail->htm, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('detail.edit', $detail->id) }}" class="badge bg-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('detail.destroy', $detail->id) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 btnDelete" data-object="Detail LKBB">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="8" class="text-danger text-center">
                                    <h4>Belum Ada Data Detail LKBB</h4>
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