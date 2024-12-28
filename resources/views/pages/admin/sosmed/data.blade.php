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
        {{-- datatable --}}
        <div class="card mb-4 bg-secondary">
            <div class="card-body">
                @if($sosmeds->count() === 0)
                <a href="{{ route('sosmed.create') }}" type="button" class="btn btn-dark mb-3">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Sosial Media
                </a>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-dark align-middle text-center text-white">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Email</th>
                                <th style="width: 14.5%">Link Facebook</th>
                                <th style="width: 14.5%">Link Instagram</th>
                                <th style="width: 14.5%">Link TikTok</th>
                                <th style="width: 14.5%">Link X/Twitter</th>
                                <th style="width: 14.5%">Link YouTube</th>
                                <th style="width: 8%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if ($sosmeds->count())
                            @foreach ($sosmeds as $sosmed)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if (!empty($sosmed->email) && $sosmed->email !== '-')
                                        <a href="mailto:{{ $sosmed->email }}" target="_blank" rel="noopener noreferrer">
                                            {{ $sosmed->email }}
                                        </a>
                                    @else
                                        <span class="text-muted">Tidak Ada</span>
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($sosmed->facebook) && $sosmed->facebook !== '-')
                                        <a href="{{ $sosmed->facebook }}" target="_blank" rel="noopener noreferrer">
                                            Klik di Sini
                                        </a>
                                    @else
                                        <span class="text-muted">Tidak Ada</span>
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($sosmed->instagram) && $sosmed->instagram !== '-')
                                        <a href="{{ $sosmed->instagram }}" target="_blank" rel="noopener noreferrer">
                                            Klik di Sini
                                        </a>
                                    @else
                                        <span class="text-muted">Tidak Ada</span>
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($sosmed->tiktok) && $sosmed->tiktok !== '-')
                                        <a href="{{ $sosmed->tiktok }}" target="_blank" rel="noopener noreferrer">
                                            Klik di Sini
                                        </a>
                                    @else
                                        <span class="text-muted">Tidak Ada</span>
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($sosmed->twitter) && $sosmed->twitter !== '-')
                                        <a href="{{ $sosmed->twitter }}" target="_blank" rel="noopener noreferrer">
                                            Klik di Sini
                                        </a>
                                    @else
                                        <span class="text-muted">Tidak Ada</span>
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($sosmed->youtube) && $sosmed->youtube !== '-')
                                        <a href="{{ $sosmed->youtube }}" target="_blank" rel="noopener noreferrer">
                                            Klik di Sini
                                        </a>
                                    @else
                                        <span class="text-muted">Tidak Ada</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('sosmed.edit', $sosmed->id) }}" class="badge bg-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('sosmed.destroy', $sosmed->id) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 btnDelete" data-object="Berkas LKBB">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-danger text-center">
                                        <h4>Belum Ada Data Sosial Media</h4>
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