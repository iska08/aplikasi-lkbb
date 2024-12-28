@php
use App\Models\Tingkatan;
$tingkatans = Tingkatan::all();
$tingkatanSD  = $tingkatans->where('nama_tingkatan', 'SD/MI Sederajat')->first();
$tingkatanSMP = $tingkatans->where('nama_tingkatan', 'SMP/MTs Sederajat')->first();
$tingkatanSMA = $tingkatans->where('nama_tingkatan', 'SMA/SMK/MA Sederajat')->first();
$tingkatanPurna = $tingkatans->where('nama_tingkatan', 'Purna/Manajemen')->first();
@endphp
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-black" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- Dashboard -->
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} parent" href="{{ route('dashboard.index') }}">
                    <div class="sb-nav-link-icon col-1">
                        <i class="fas fa-home"></i>
                    </div>
                    <b>Dashboard</b>
                </a>
                <!-- Internal -->
                @if(auth()->user()->level === '1ADMIN')
                <a href="#" class="nav-link collapsed {{ Request::is('dashboard/internal*') ? 'active' : '' }} parent" data-bs-toggle="collapse" data-bs-target="#masterDataCollapse1" aria-expanded="{{ Request::is('dashboard/internal*') ? 'true' : 'false' }}">
                    <div class="sb-nav-link-icon col-1">
                        <i class="fas fa-database"></i>
                    </div>
                    <b>Informasi LKBB</b>
                    <i class="fas fa-caret-down ms-auto"></i>
                </a>
                <div class="collapse {{ Request::is('dashboard/internal*') ? 'show' : '' }}" id="masterDataCollapse1" data-bs-parent="#sidenavAccordion">
                    <a class="nav-link {{ Request::is('dashboard/internal/detail*') ? 'active' : '' }} child" href="{{ route('detail.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Detail LKBB
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/internal/timeline*') ? 'active' : '' }} child" href="{{ route('timeline.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Timeline
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/internal/berkas*') ? 'active' : '' }} child" href="{{ route('berkas.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Berkas
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/internal/sosmed*') ? 'active' : '' }} child" href="{{ route('sosmed.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Sosial Media
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/internal/benefit*') ? 'active' : '' }} child" href="{{ route('benefit.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Benefit
                    </a>
                </div>
                @endif
                <!-- Administrasi -->
                @if(auth()->user()->level === '1ADMIN' || auth()->user()->level === '4PESERTA' || auth()->user()->level === '5CALONPESERTA')
                <a href="#" class="nav-link collapsed {{ Request::is('dashboard/administrasi*') ? 'active' : '' }} parent" data-bs-toggle="collapse" data-bs-target="#masterDataCollapse2" aria-expanded="{{ Request::is('dashboard/administrasi*') ? 'true' : 'false' }}">
                    <div class="sb-nav-link-icon col-1">
                        <i class="fas fa-folder"></i>
                    </div>
                    <b>Administrasi</b>
                    <i class="fas fa-caret-down ms-auto"></i>
                </a>
                @endif
                <div class="collapse {{ Request::is('dashboard/administrasi*') ? 'show' : '' }}" id="masterDataCollapse2" data-bs-parent="#sidenavAccordion">
                    @if(auth()->user()->level === '1ADMIN')
                    <a class="nav-link {{ Request::is('dashboard/administrasi/peserta*') ? 'active' : '' }} child" href="{{ route('peserta.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Daftar Peserta
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/administrasi/bayar*') ? 'active' : '' }} child" href="{{ route('bayar.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Pembayaran
                    </a>
                    @elseif(auth()->user()->level === '4PESERTA')
                    <a class="nav-link {{ Request::is('dashboard/administrasi/bayar*') ? 'active' : '' }} child" href="{{ route('bayar.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Pembayaran
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/administrasi/foto*') ? 'active' : '' }} child" href="{{ route('foto.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Foto dan Surat Rekomendasi
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/administrasi/pleton*') ? 'active' : '' }} child" href="{{ route('pleton.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Daftar Anggota Pleton
                    </a>
                    @elseif(auth()->user()->level === '5CALONPESERTA')
                    <a class="nav-link {{ Request::is('dashboard/administrasi/bayar*') ? 'active' : '' }} child" href="{{ route('bayar.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Pembayaran
                    </a>
                    @endif
                </div>
                <!-- Teknis Lomba -->
                @if(auth()->user()->level === '1ADMIN' || auth()->user()->level === '4PESERTA' || auth()->user()->level === '5CALONPESERTA')
                <a href="#" class="nav-link collapsed {{ Request::is('dashboard/teknis*') ? 'active' : '' }} parent" data-bs-toggle="collapse" data-bs-target="#masterDataCollapse3" aria-expanded="{{ Request::is('dashboard/teknis*') ? 'true' : 'false' }}">
                    <div class="sb-nav-link-icon col-1">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <b>Teknis Lomba</b>
                    <i class="fas fa-caret-down ms-auto"></i>
                </a>
                @endif
                <div class="collapse {{ Request::is('dashboard/teknis*') ? 'show' : '' }}" id="masterDataCollapse3" data-bs-parent="#sidenavAccordion">
                    @if(auth()->user()->level === '1ADMIN')
                    <a class="nav-link {{ Request::is('dashboard/teknis/cp*') ? 'active' : '' }} child" href="{{ route('cp.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Contact Person
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/teknis/tingkatan*') ? 'active' : '' }} child" href="{{ route('tingkatan.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Tingkatan Lomba
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/teknis/posisi*') ? 'active' : '' }} child" href="{{ route('posisi.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Posisi
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/teknis/jenis*') ? 'active' : '' }} child" href="{{ route('jenis.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Jenis Aba-Aba
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/teknis/aba-aba*') ? 'active' : '' }} child" href="{{ route('aba-aba.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Aba-Aba
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/teknis/penilaian*') ? 'active' : '' }} child" href="{{ route('penilaian.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Skala Penilaian
                    </a>
                    @elseif(auth()->user()->level === '4PESERTA' || auth()->user()->level === '5CALONPESERTA')
                    <a class="nav-link {{ Request::is('dashboard/teknis/penilaian*') ? 'active' : '' }} child" href="{{ route('penilaian.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Skala Penilaian
                    </a>
                    @endif
                </div>
                <!-- Nilai PBB dan Danton -->
                @if(auth()->user()->level === '1ADMIN' || auth()->user()->level === '2JURIPBB')
                <a href="#" class="nav-link collapsed {{ Request::is('dashboard/pbb-danton*') ? 'active' : '' }} parent" data-bs-toggle="collapse" data-bs-target="#masterDataCollapse4" aria-expanded="{{ Request::is('dashboard/pbb-danton*') ? 'true' : 'false' }}">
                    <div class="sb-nav-link-icon col-1">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <b>Nilai PBB & Danton</b>
                    <i class="fas fa-caret-down ms-auto"></i>
                </a>
                @endif
                <div class="collapse {{ Request::is('dashboard/pbb-danton*') ? 'show' : '' }}" id="masterDataCollapse4" data-bs-parent="#sidenavAccordion">
                    @if(auth()->user()->level === '1ADMIN')
                    @if($tingkatanSD)
                    <a class="nav-link {{ Request::is('dashboard/pbb-danton/sd*') ? 'active' : '' }} child" href="{{ route('pbb-danton-sd.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        SD/MI Sederajat
                    </a>
                    @endif
                    @if($tingkatanSMP)
                    <a class="nav-link {{ Request::is('dashboard/pbb-danton/smp*') ? 'active' : '' }} child" href="{{ route('pbb-danton-smp.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        SMP/MTs Sederajat
                    </a>
                    @endif
                    @if($tingkatanSMA)
                    <a class="nav-link {{ Request::is('dashboard/pbb-danton/sma*') ? 'active' : '' }} child" href="{{ route('pbb-danton-sma.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        SMA/SMK/MA Sederajat
                    </a>
                    @endif
                    @if($tingkatanPurna)
                    <a class="nav-link {{ Request::is('dashboard/pbb-danton/purna*') ? 'active' : '' }} child" href="{{ route('pbb-danton-purna.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Purna/Manajemen
                    </a>
                    @endif
                    @elseif(auth()->user()->level === '2JURIPBB')
                    @if($tingkatanSD)
                    <a class="nav-link {{ Request::is('dashboard/pbb-danton/sd*') ? 'active' : '' }} child" href="{{ route('pbb-danton-sd.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        SD/MI Sederajat
                    </a>
                    @endif
                    @if($tingkatanSMP)
                    <a class="nav-link {{ Request::is('dashboard/pbb-danton/smp*') ? 'active' : '' }} child" href="{{ route('pbb-danton-smp.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        SMP/MTs Sederajat
                    </a>
                    @endif
                    @if($tingkatanSMA)
                    <a class="nav-link {{ Request::is('dashboard/pbb-danton/sma*') ? 'active' : '' }} child" href="{{ route('pbb-danton-sma.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        SMA/SMK/MA Sederajat
                    </a>
                    @endif
                    @if($tingkatanPurna)
                    <a class="nav-link {{ Request::is('dashboard/pbb-danton/purna*') ? 'active' : '' }} child" href="{{ route('pbb-danton-purna.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Purna/Manajemen
                    </a>
                    @endif
                    @endif
                </div>
                <!-- Nilai Variasi dan Formasi -->
                @if(auth()->user()->level === '1ADMIN' || auth()->user()->level === '3JURIVARFOR')
                <a href="#" class="nav-link collapsed {{ Request::is('dashboard/variasi-formasi*') ? 'active' : '' }} parent" data-bs-toggle="collapse" data-bs-target="#masterDataCollapse5" aria-expanded="{{ Request::is('dashboard/variasi-formasi*') ? 'true' : 'false' }}">
                    <div class="sb-nav-link-icon col-1">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <b>Nilai Variasi & Formasi</b>
                    <i class="fas fa-caret-down ms-auto"></i>
                </a>
                @endif
                <div class="collapse {{ Request::is('dashboard/variasi-formasi*') ? 'show' : '' }}" id="masterDataCollapse5" data-bs-parent="#sidenavAccordion">
                    @if(auth()->user()->level === '1ADMIN')
                    @if($tingkatanSD)
                    <a class="nav-link {{ Request::is('dashboard/variasi-formasi/sd*') ? 'active' : '' }} child" href="{{ route('variasi-formasi-sd.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        SD/MI Sederajat
                    </a>
                    @endif
                    @if($tingkatanSMP)
                    <a class="nav-link {{ Request::is('dashboard/variasi-formasi/smp*') ? 'active' : '' }} child" href="{{ route('variasi-formasi-smp.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        SMP/MTs Sederajat
                    </a>
                    @endif
                    @if($tingkatanSMA)
                    <a class="nav-link {{ Request::is('dashboard/variasi-formasi/sma*') ? 'active' : '' }} child" href="{{ route('variasi-formasi-sma.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        SMA/SMK/MA Sederajat
                    </a>
                    @endif
                    @if($tingkatanPurna)
                    <a class="nav-link {{ Request::is('dashboard/variasi-formasi/purna*') ? 'active' : '' }} child" href="{{ route('variasi-formasi-purna.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Purna/Manajemen
                    </a>
                    @endif
                    @elseif(auth()->user()->level === '3JURIVARFOR')
                    @if($tingkatanSD)
                    <a class="nav-link {{ Request::is('dashboard/variasi-formasi/sd*') ? 'active' : '' }} child" href="{{ route('variasi-formasi-sd.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        SD/MI Sederajat
                    </a>
                    @endif
                    @if($tingkatanSMP)
                    <a class="nav-link {{ Request::is('dashboard/variasi-formasi/smp*') ? 'active' : '' }} child" href="{{ route('variasi-formasi-smp.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        SMP/MTs Sederajat
                    </a>
                    @endif
                    @if($tingkatanSMA)
                    <a class="nav-link {{ Request::is('dashboard/variasi-formasi/sma*') ? 'active' : '' }} child" href="{{ route('variasi-formasi-sma.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        SMA/SMK/MA Sederajat
                    </a>
                    @endif
                    @if($tingkatanPurna)
                    <a class="nav-link {{ Request::is('dashboard/variasi-formasi/purna*') ? 'active' : '' }} child" href="{{ route('variasi-formasi-purna.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Purna/Manajemen
                    </a>
                    @endif
                    @endif
                </div>
                <!-- Rekap Nilai -->
                @if(auth()->user()->level === '1ADMIN' || auth()->user()->level === '4PESERTA')
                <a href="#" class="nav-link collapsed {{ Request::is('dashboard/rekap*') ? 'active' : '' }} parent" data-bs-toggle="collapse" data-bs-target="#masterDataCollapse6" aria-expanded="{{ Request::is('dashboard/rekap*') ? 'true' : 'false' }}">
                    <div class="sb-nav-link-icon col-1">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <b>Rekap Nilai</b>
                    <i class="fas fa-caret-down ms-auto"></i>
                </a>
                @endif
                <div class="collapse {{ Request::is('dashboard/rekap*') ? 'show' : '' }}" id="masterDataCollapse6" data-bs-parent="#sidenavAccordion">
                    @if(auth()->user()->level === '1ADMIN')
                    <a class="nav-link {{ Request::is('dashboard/rekap/rekap-akhir*') ? 'active' : '' }} child" href="{{ route('rekap.rekapakhir') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Rekap Nilai Akhir
                    </a>
                    @elseif(auth()->user()->level === '4PESERTA')
                    <a class="nav-link {{ Request::is('dashboard/rekap/peserta*') ? 'active' : '' }} child" href="{{ route('rekap.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Rekap Nilai Peserta
                    </a>
                    @endif
                </div>
                <!-- Setting Pengguna -->
                <a href="#" class="nav-link collapsed {{ Request::is('dashboard/pengguna*') ? 'active' : '' }} parent" data-bs-toggle="collapse" data-bs-target="#masterDataCollapse7" aria-expanded="{{ Request::is('dashboard/pengguna*') ? 'true' : 'false' }}">
                    <div class="sb-nav-link-icon col-1">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    <b>Setting Pengguna</b>
                    <i class="fas fa-caret-down ms-auto"></i>
                </a>
                <div class="collapse {{ Request::is('dashboard/pengguna*') ? 'show' : '' }}" id="masterDataCollapse7" data-bs-parent="#sidenavAccordion">
                    @if(auth()->user()->level === '1ADMIN')
                    <a class="nav-link {{ Request::is('dashboard/pengguna/user*') ? 'active' : '' }} child" href="{{ route('user.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Data Pengguna
                    </a>
                    @endif
                    <a class="nav-link {{ Request::is('dashboard/pengguna/profile*') ? 'active' : '' }} child" href="{{ route('profile.index') }}">
                        <div class="sb-nav-link-icon col-1">
                            <i class="fas"></i>
                        </div>
                        Ubah Profil
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>
<style>
    .nav-link {
        margin: 0px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        position: relative;
    }
    .nav-link.active {
        background-color: grey;
    }
    .nav-link.active.child {
        background-color: #2d2d2d;
    }
    .nav-link .fa-caret-down,
    .nav-link .fa-caret-right {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        transition: transform 0.3s ease;
    }
    .nav-link.collapsed .fa-caret-down {
        transform: translateY(-50%) rotate(90deg);
    }
    .nav-link.collapsed.active.parent .fa-caret-down {
        transform: translateY(-50%) rotate(0deg);
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const urlParams = new URLSearchParams(window.location.search);
        const activeCollapse = urlParams.get('collapse');
        if (activeCollapse) {
            const collapseElement = document.getElementById(activeCollapse);
            if (collapseElement) {
                const bsCollapse = new bootstrap.Collapse(collapseElement);
                bsCollapse.show();
            }
        }
        const collapseElements = document.querySelectorAll('.collapse');
        collapseElements.forEach((collapseElement) => {
            collapseElement.addEventListener('hidden.bs.collapse', function () {
                const navLink = document.querySelector(`[data-bs-target="#${this.id}"]`);
                if (navLink) {
                    navLink.classList.remove('parent');
                    navLink.classList.add('collapsed');
                }
            });
        });
    });
</script>