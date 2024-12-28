@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('pbb-danton-smp.store') }}">
            @csrf
            <h4 class="text-center">No Urut Pleton</h4>
            <div class="mb-3">
                <select class="form-select @error('peserta_id') is-invalid @enderror" id="peserta_id" name="peserta_id" required>
                    <option value="" disabled selected>Pilih No Urut Pleton</option>
                    @foreach ($nilaipbbdantons as $nilaipbbdanton)
                        @if (old('peserta_id') == $nilaipbbdanton->id)
                            <option value="{{ $nilaipbbdanton->id }}" selected>Pleton No. Urut {{ $nilaipbbdanton->no_urut}}</option>
                        @else
                            <option value="{{ $nilaipbbdanton->id }}">Pleton No. Urut {{ $nilaipbbdanton->no_urut}}</option>
                        @endif
                    @endforeach
                </select>
                @error('peserta_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            @if ($pbbs->count())
            <h4 class="mt-4">Penilaian PBB</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-dark text-white text-center align-middle">
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Nama Aba-Aba</th>
                            <th style="width: 35%">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pbbs as $key => $pbb)
                        <tr>
                            <td class="text-center">{{ $pbb->urutan_abaaba }}</td>
                            <td>{{ $pbb->nama_abaaba }}</td>
                            <input type="hidden" name="abaaba_id[]" value="{{ $pbb->id }}">
                            <td class="text-center">
                                <select class="form-select @error('points') is-invalid @enderror" name="points[]" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="{{ $pbb->skala1 }}">Kurang - {{ $pbb->skala1 }}</option>
                                    <option value="{{ $pbb->skala2 }}">Kurang - {{ $pbb->skala2 }}</option>
                                    <option value="{{ $pbb->skala3 }}">Cukup - {{ $pbb->skala3 }}</option>
                                    <option value="{{ $pbb->skala4 }}">Cukup - {{ $pbb->skala4 }}</option>
                                    <option value="{{ $pbb->skala5 }}">Cukup - {{ $pbb->skala5 }}</option>
                                    <option value="{{ $pbb->skala6 }}">Baik - {{ $pbb->skala6 }}</option>
                                    <option value="{{ $pbb->skala7 }}">Baik - {{ $pbb->skala7 }}</option>
                                </select>
                                @error('points')
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
            @if ($dantons->count())
            <h4 class="mt-4">Penilaian Danton</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-dark text-white text-center align-middle">
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Nama Aba-Aba</th>
                            <th style="width: 35%">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dantons as $key => $danton)
                        <tr>
                            <td class="text-center">{{ $danton->urutan_abaaba }}</td>
                            <td>{{ $danton->nama_abaaba }}</td>
                            <td class="text-center">
                                <input type="hidden" name="abaaba_id[]" value="{{ $danton->id }}">
                                <select class="form-select @error('points') is-invalid @enderror" name="points[]" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="{{ $danton->skala1 }}">Kurang - {{ $danton->skala1 }}</option>
                                    <option value="{{ $danton->skala2 }}">Kurang - {{ $danton->skala2 }}</option>
                                    <option value="{{ $danton->skala3 }}">Cukup - {{ $danton->skala3 }}</option>
                                    <option value="{{ $danton->skala4 }}">Cukup - {{ $danton->skala4 }}</option>
                                    <option value="{{ $danton->skala5 }}">Cukup - {{ $danton->skala5 }}</option>
                                    <option value="{{ $danton->skala6 }}">Baik - {{ $danton->skala6 }}</option>
                                    <option value="{{ $danton->skala7 }}">Baik - {{ $danton->skala7 }}</option>
                                </select>
                                @error('points')
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
            <a href="{{ route('pbb-danton-smp.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection
