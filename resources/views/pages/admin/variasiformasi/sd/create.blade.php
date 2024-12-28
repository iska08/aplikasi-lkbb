@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4 border-bottom">
    <h1 class="mt-4 h2">{{ $title }}</h1>
</div>
<div class="container-fluid px-4 mt-3">
    <div class="card mb-4 bg-secondary">
        <form class="col-lg-8 px-4 mt-3" method="POST" action="{{ route('variasi-formasi-sd.store') }}">
            @csrf
            <h4 class="text-center">No Urut Pleton</h4>
            <div class="mb-3">
                <select class="form-select @error('peserta_id') is-invalid @enderror" id="peserta_id" name="peserta_id" required>
                    <option value="" disabled selected>Pilih No Urut Pleton</option>
                    @foreach ($nilaivarfors as $nilaivarfor)
                        @if (old('peserta_id') == $nilaivarfor->id)
                            <option value="{{ $nilaivarfor->id }}" selected>Pleton No. Urut {{ $nilaivarfor->no_urut}}</option>
                        @else
                            <option value="{{ $nilaivarfor->id }}">Pleton No. Urut {{ $nilaivarfor->no_urut}}</option>
                        @endif
                    @endforeach
                </select>
                @error('peserta_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            @if ($variasis->count())
            <h4 class="mt-4">Penilaian Variasi</h4>
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
                        @foreach ($variasis as $key => $variasi)
                        <tr>
                            <td class="text-center">{{ $variasi->urutan_abaaba }}</td>
                            <td>{{ $variasi->nama_abaaba }}</td>
                            <input type="hidden" name="abaaba_id[]" value="{{ $variasi->id }}">
                            <td class="text-center">
                                <select class="form-select @error('points') is-invalid @enderror" name="points[]" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="{{ $variasi->skala1 }}">Kurang - {{ $variasi->skala1 }}</option>
                                    <option value="{{ $variasi->skala2 }}">Kurang - {{ $variasi->skala2 }}</option>
                                    <option value="{{ $variasi->skala3 }}">Cukup - {{ $variasi->skala3 }}</option>
                                    <option value="{{ $variasi->skala4 }}">Cukup - {{ $variasi->skala4 }}</option>
                                    <option value="{{ $variasi->skala5 }}">Cukup - {{ $variasi->skala5 }}</option>
                                    <option value="{{ $variasi->skala6 }}">Baik - {{ $variasi->skala6 }}</option>
                                    <option value="{{ $variasi->skala7 }}">Baik - {{ $variasi->skala7 }}</option>
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
            @if ($formasis->count())
            <h4 class="mt-4">Penilaian Formasi</h4>
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
                        @foreach ($formasis as $key => $formasi)
                        <tr>
                            <td class="text-center">{{ $formasi->urutan_abaaba }}</td>
                            <td>{{ $formasi->nama_abaaba }}</td>
                            <td class="text-center">
                                <input type="hidden" name="abaaba_id[]" value="{{ $formasi->id }}">
                                <select class="form-select @error('points') is-invalid @enderror" name="points[]" required>
                                    <option value="" disabled selected>-- Pilih Nilai --</option>
                                    <option value="{{ $formasi->skala1 }}">Kurang - {{ $formasi->skala1 }}</option>
                                    <option value="{{ $formasi->skala2 }}">Kurang - {{ $formasi->skala2 }}</option>
                                    <option value="{{ $formasi->skala3 }}">Cukup - {{ $formasi->skala3 }}</option>
                                    <option value="{{ $formasi->skala4 }}">Cukup - {{ $formasi->skala4 }}</option>
                                    <option value="{{ $formasi->skala5 }}">Cukup - {{ $formasi->skala5 }}</option>
                                    <option value="{{ $formasi->skala6 }}">Baik - {{ $formasi->skala6 }}</option>
                                    <option value="{{ $formasi->skala7 }}">Baik - {{ $formasi->skala7 }}</option>
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
            @endif<input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <button type="submit" class="btn btn-dark mb-3">Simpan</button>
            <a href="{{ route('variasi-formasi-sd.index') }}" class="btn btn-danger mb-3">Cancel</a>
        </form>
    </div>
</div>
@endsection
