@extends('layouts.admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="row align-items-center">
            <div class="col-sm-6 col-md-12">
                <h1 class="mt-4">{{ $title }}</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('bayar.index') }}">Data Peserta</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        {{-- datatable --}}
        <div class="card mb-4 bg-secondary">
            <div class="card-body">
                <div class="mb-3">
                    <form action="{{ route('bayar.show', ['bayar' => $id]) }}" method="GET" class="d-inline">
                        <label for="perPage" class="form-label">Items per page:</label>
                        <select name="perPage" id="perPage" class="form-select" onchange="this.form.submit()">
                            @foreach ($perPageOptions as $option)
                            <option value="{{ $option }}" {{ $perPage == $option ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Bukti Pembayaran</th>
                                <th style="width: 17%">Tanggal Dibuat</th>
                                <th style="width: 17%">Terakhir Diperbarui</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($bayars->count())
                            @foreach ($bayars as $bayar)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($bayar->screenshot == "" || $bayar->screenshot == "-")
                                    <img src="{{ url('frontend/images/No Image.png') }}" alt="Gambar" style="width: 5cm;">
                                    @else
                                    <img src="{{ asset('storage/' . $bayar->screenshot) }}" alt="Gambar" style="width: 5cm;">
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($bayar->created_at)->translatedFormat('l, d F Y H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($bayar->updated_at)->translatedFormat('l, d F Y H:i') }}</td>
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
                    {{ $bayars->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection