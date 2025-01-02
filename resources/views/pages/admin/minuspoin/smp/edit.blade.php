@extends('layouts.admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="row align-items-center">
            <div class="col-sm-6 col-md-12">
                <h1 class="mt-4">{{ $title }}</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('minus-poin-smp.index') }}">Data Pengurangan Nilai</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        <div class="card mb-4 bg-secondary">
            <form class="px-4" action="{{ route('minus-poin-smp.update', $peserta->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Keterangan</th>
                                <th>Minus Poin</th>
                                <th style="width: 10%;">Jumlah</th>
                                <th>Total Pengurangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalKeseluruhan = 0;
                            @endphp
                            @foreach ($minuspoins as $key => $minuspoin)
                            @php
                            $total = $minuspoin->poin * $minuspoin->jumlah;
                            $totalKeseluruhan += $total;
                            @endphp
                            <tr>
                                <td style="vertical-align: middle !important;" class="text-center">{{ $loop->iteration }}</td>
                                <td style="vertical-align: middle !important;">{{ $minuspoin->keterangan }}</td>
                                <td style="vertical-align: middle !important;" class="text-center">-{{ $minuspoin->poin }} per {{ $minuspoin->per }}</td>
                                <td class="text-center">
                                    <input type="number" name="minuspoins[{{ $key }}][jumlah]" class="form-control @error('minuspoins.' . $key . '.jumlah') is-invalid @enderror" value="{{ old('minuspoins.' . $key . '.jumlah', $minuspoin->jumlah) }}" min="0" required>
                                    @error("minuspoins.{$key}.jumlah")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="hidden" name="minuspoins[{{ $key }}][id]" value="{{ $minuspoin->id }}">
                                </td>
                                <td style="vertical-align: middle !important;" class="text-center">-{{ $total }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-center"><strong>Total Pengurangan Nilai</strong></td>
                                <td class="text-center"><strong>-{{ $totalKeseluruhan }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-dark mb-3">Simpan Perubahan</button>
                <a href="{{ route('minus-poin-smp.index') }}" class="btn btn-danger mb-3">Kembali</a>
            </form>
        </div>
    </div>
</main>
@endsection