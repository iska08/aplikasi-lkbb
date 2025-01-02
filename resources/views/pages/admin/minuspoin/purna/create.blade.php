@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="px-4 mt-3" method="POST" action="{{ route('minus-poin-purna.store') }}">
            @csrf
            <h4 class="text-center">No Urut Pleton</h4>
            <div class="mb-3">
                <select class="form-select @error('peserta_id') is-invalid @enderror" id="peserta_id" name="peserta_id" required>
                    <option value="" disabled selected>Pilih No Urut Pleton</option>
                    @foreach ($minuspoins as $minuspoin)
                        @if (old('peserta_id') == $minuspoin->id)
                            <option value="{{ $minuspoin->id }}" selected>Pleton No. Urut {{ $minuspoin->no_urut}}</option>
                        @else
                            <option value="{{ $minuspoin->id }}">Pleton No. Urut {{ $minuspoin->no_urut}}</option>
                        @endif
                    @endforeach
                </select>
                @error('peserta_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            @if ($pengurangans->count())
            <h4 class="mt-4">Penilaian PBB</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-dark text-white text-center align-middle">
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Pengurangan Nilai</th>
                            <th>Poin Minus</th>
                            <th style="width: 17%;">Jumlah Pengurangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengurangans as $key => $pengurangan)
                        <tr>
                            <td style="vertical-align: middle !important;" class="text-center">{{ $loop->iteration }}</td>
                            <td style="vertical-align: middle !important;">{{ $pengurangan->keterangan }}</td>
                            <td style="vertical-align: middle !important;" class="text-center">-{{ $pengurangan->poin }} per {{ $pengurangan->per }}</td>
                            <input type="hidden" name="pengurangan_id[]" value="{{ $pengurangan->id }}">
                            <input type="hidden" name="minus[]" value="{{ $pengurangan->poin }}">
                            <td class="text-center">
                                <input type="number" min="0" class="form-control @error('jumlah.' . $key) is-invalid @enderror" id="jumlah_{{ $key }}" name="jumlah[{{ $key }}]" value="{{ old('jumlah.' . $key) }}" required placeholder="Masukkan Jumlah Pengurangan Nilai">
                                @error('jumlah.' . $key)
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <button type="submit" class="btn btn-dark mb-3">Simpan</button>
            <a href="{{ route('minus-poin-purna.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection
