<?php

use App\Http\Controllers\Admin\AbaabaController;
use App\Http\Controllers\Admin\BayarController;
use App\Http\Controllers\Admin\BenefitController;
use App\Http\Controllers\Admin\BerkasController;
use App\Http\Controllers\Admin\CpController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DetailController;
use App\Http\Controllers\Admin\FotoController;
use App\Http\Controllers\Admin\JenisController;
use App\Http\Controllers\Admin\NilaipbbdantonpurnaController;
use App\Http\Controllers\Admin\NilaipbbdantonsdController;
use App\Http\Controllers\Admin\NilaipbbdantonsmpController;
use App\Http\Controllers\Admin\NilaipbbdantonsmaController;
use App\Http\Controllers\Admin\NilaivarforpurnaController;
use App\Http\Controllers\Admin\NilaivarforsdController;
use App\Http\Controllers\Admin\NilaivarforsmpController;
use App\Http\Controllers\Admin\NilaivarforsmaController;
use App\Http\Controllers\Admin\PenilaianController;
use App\Http\Controllers\Admin\PesertaController;
use App\Http\Controllers\Admin\PletonController;
use App\Http\Controllers\Admin\PosisiController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RekapController;
use App\Http\Controllers\Admin\SosmedController;
use App\Http\Controllers\Admin\TimelineController;
use App\Http\Controllers\Admin\TingkatanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PortalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PortalController::class, 'index'])
    ->name('portal.index');
Route::get('/register', [RegisterController::class, 'index'])
    ->name('register.index');
Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.register');
Route::get('/login', [LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login.index');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');
Route::prefix('dashboard')
    // ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard.index');
        Route::resources([
            'internal/detail'       => DetailController::class,
            'internal/timeline'     => TimelineController::class,
            'internal/berkas'       => BerkasController::class,
            'internal/sosmed'       => SosmedController::class,
            'internal/benefit'      => BenefitController::class,
            'administrasi/bayar'    => BayarController::class,
            'administrasi/peserta'  => PesertaController::class,
            'administrasi/pleton'   => PletonController::class,
            'teknis/aba-aba'        => AbaabaController::class,
            'teknis/cp'             => CpController::class,
            'teknis/jenis'          => JenisController::class,
            'teknis/penilaian'      => PenilaianController::class,
            'teknis/posisi'         => PosisiController::class,
            'teknis/tingkatan'      => TingkatanController::class,
            'pengguna/user'         => UserController::class,
        ]);
        Route::get('teknis/aba-aba/{aba-aba:slug}', [AbaabaController::class, 'show'])
            ->name('aba-aba.show');
        Route::get('teknis/penilaian/{penilaian:slug}', [PenilaianController::class, 'show'])
            ->name('penilaian.show');
        // Route untuk PBB & Danton
        Route::prefix('pbb-danton')->group(function () {
            // SD
            Route::get('/sd', [NilaipbbdantonsdController::class, 'index'])->name('pbb-danton-sd.index');
            Route::get('/sd/create', [NilaipbbdantonsdController::class, 'create'])->name('pbb-danton-sd.create');
            Route::post('/sd', [NilaipbbdantonsdController::class, 'store'])->name('pbb-danton-sd.store');
            Route::get('/sd/{id}', [NilaipbbdantonsdController::class, 'show'])->name('pbb-danton-sd.show');
            Route::get('/sd/{id}/edit', [NilaipbbdantonsdController::class, 'edit'])->name('pbb-danton-sd.edit');
            Route::put('/sd/{id}', [NilaipbbdantonsdController::class, 'update'])->name('pbb-danton-sd.update');
            Route::delete('/sd/{id}', [NilaipbbdantonsdController::class, 'destroy'])->name('pbb-danton-sd.destroy');
            // SMP
            Route::get('/smp', [NilaipbbdantonsmpController::class, 'index'])->name('pbb-danton-smp.index');
            Route::get('/smp/create', [NilaipbbdantonsmpController::class, 'create'])->name('pbb-danton-smp.create');
            Route::post('/smp', [NilaipbbdantonsmpController::class, 'store'])->name('pbb-danton-smp.store');
            Route::get('/smp/{id}', [NilaipbbdantonsmpController::class, 'show'])->name('pbb-danton-smp.show');
            Route::get('/smp/{id}/edit', [NilaipbbdantonsmpController::class, 'edit'])->name('pbb-danton-smp.edit');
            Route::put('/smp/{id}', [NilaipbbdantonsmpController::class, 'update'])->name('pbb-danton-smp.update');
            Route::delete('/smp/{id}', [NilaipbbdantonsmpController::class, 'destroy'])->name('pbb-danton-smp.destroy');
            // SMA
            Route::get('/sma', [NilaipbbdantonsmaController::class, 'index'])->name('pbb-danton-sma.index');
            Route::get('/sma/create', [NilaipbbdantonsmaController::class, 'create'])->name('pbb-danton-sma.create');
            Route::post('/sma', [NilaipbbdantonsmaController::class, 'store'])->name('pbb-danton-sma.store');
            Route::get('/sma/{id}', [NilaipbbdantonsmaController::class, 'show'])->name('pbb-danton-sma.show');
            Route::get('/sma/{id}/edit', [NilaipbbdantonsmaController::class, 'edit'])->name('pbb-danton-sma.edit');
            Route::put('/sma/{id}', [NilaipbbdantonsmaController::class, 'update'])->name('pbb-danton-sma.update');
            Route::delete('/sma/{id}', [NilaipbbdantonsmaController::class, 'destroy'])->name('pbb-danton-sma.destroy');
            // Purna
            Route::get('/purna', [NilaipbbdantonpurnaController::class, 'index'])->name('pbb-danton-purna.index');
            Route::get('/purna/create', [NilaipbbdantonpurnaController::class, 'create'])->name('pbb-danton-purna.create');
            Route::post('/purna', [NilaipbbdantonpurnaController::class, 'store'])->name('pbb-danton-purna.store');
            Route::get('/purna/{id}', [NilaipbbdantonpurnaController::class, 'show'])->name('pbb-danton-purna.show');
            Route::get('/purna/{id}/edit', [NilaipbbdantonpurnaController::class, 'edit'])->name('pbb-danton-purna.edit');
            Route::put('/purna/{id}', [NilaipbbdantonpurnaController::class, 'update'])->name('pbb-danton-purna.update');
            Route::delete('/purna/{id}', [NilaipbbdantonpurnaController::class, 'destroy'])->name('pbb-danton-purna.destroy');
        });
        // Route untuk Variasi & Formasi
        Route::prefix('variasi-formasi')->group(function () {
            // SD
            Route::get('/sd', [NilaivarforsdController::class, 'index'])->name('variasi-formasi-sd.index');
            Route::get('/sd/create', [NilaivarforsdController::class, 'create'])->name('variasi-formasi-sd.create');
            Route::post('/sd', [NilaivarforsdController::class, 'store'])->name('variasi-formasi-sd.store');
            Route::get('/sd/{id}', [NilaivarforsdController::class, 'show'])->name('variasi-formasi-sd.show');
            Route::get('/sd/{id}/edit', [NilaivarforsdController::class, 'edit'])->name('variasi-formasi-sd.edit');
            Route::put('/sd/{id}', [NilaivarforsdController::class, 'update'])->name('variasi-formasi-sd.update');
            Route::delete('/sd/{id}', [NilaivarforsdController::class, 'destroy'])->name('variasi-formasi-sd.destroy');
            // SMP
            Route::get('/smp', [NilaivarforsmpController::class, 'index'])->name('variasi-formasi-smp.index');
            Route::get('/smp/create', [NilaivarforsmpController::class, 'create'])->name('variasi-formasi-smp.create');
            Route::post('/smp', [NilaivarforsmpController::class, 'store'])->name('variasi-formasi-smp.store');
            Route::get('/smp/{id}', [NilaivarforsmpController::class, 'show'])->name('variasi-formasi-smp.show');
            Route::get('/smp/{id}/edit', [NilaivarforsmpController::class, 'edit'])->name('variasi-formasi-smp.edit');
            Route::put('/smp/{id}', [NilaivarforsmpController::class, 'update'])->name('variasi-formasi-smp.update');
            Route::delete('/smp/{id}', [NilaivarforsmpController::class, 'destroy'])->name('variasi-formasi-smp.destroy');
            // SMA
            Route::get('/sma', [NilaivarforsmaController::class, 'index'])->name('variasi-formasi-sma.index');
            Route::get('/sma/create', [NilaivarforsmaController::class, 'create'])->name('variasi-formasi-sma.create');
            Route::post('/sma', [NilaivarforsmaController::class, 'store'])->name('variasi-formasi-sma.store');
            Route::get('/sma/{id}', [NilaivarforsmaController::class, 'show'])->name('variasi-formasi-sma.show');
            Route::get('/sma/{id}/edit', [NilaivarforsmaController::class, 'edit'])->name('variasi-formasi-sma.edit');
            Route::put('/sma/{id}', [NilaivarforsmaController::class, 'update'])->name('variasi-formasi-sma.update');
            Route::delete('/sma/{id}', [NilaivarforsmaController::class, 'destroy'])->name('variasi-formasi-sma.destroy');
            // Purna
            Route::get('/purna', [NilaivarforpurnaController::class, 'index'])->name('variasi-formasi-purna.index');
            Route::get('/purna/create', [NilaivarforpurnaController::class, 'create'])->name('variasi-formasi-purna.create');
            Route::post('/purna', [NilaivarforpurnaController::class, 'store'])->name('variasi-formasi-purna.store');
            Route::get('/purna/{id}', [NilaivarforpurnaController::class, 'show'])->name('variasi-formasi-purna.show');
            Route::get('/purna/{id}/edit', [NilaivarforpurnaController::class, 'edit'])->name('variasi-formasi-purna.edit');
            Route::put('/purna/{id}', [NilaivarforpurnaController::class, 'update'])->name('variasi-formasi-purna.update');
            Route::delete('/purna/{id}', [NilaivarforpurnaController::class, 'destroy'])->name('variasi-formasi-purna.destroy');
        });
        Route::get('teknis/aba-aba/{id}', [AbaabaController::class, 'show'])
            ->name('aba-aba.show');
        Route::get('teknis/penilaian/{id}', [AbaabaController::class, 'show'])
            ->name('penilaian.show');
        // Rekap Nilai
        Route::get('rekap/peserta', [RekapController::class, 'index'])
            ->name('rekap.index');
        Route::get('rekap/peserta/pbb-danton/{id}', [RekapController::class, 'pbbdanton'])
            ->name('rekap.pbbdanton');
        Route::get('rekap/peserta/pbb-danton/{id}/view-pdf', [RekapController::class, 'pbbDantonPdf'])
            ->name('rekap.pbbdanton.pbbDantonPdf');
        Route::get('rekap/peserta/variasi-formasi/{id}', [RekapController::class, 'varfor']) 
            ->name('rekap.varfor');
        Route::get('rekap/peserta/variasi-formasi/{id}/view-pdf', [RekapController::class, 'varforPdf'])
            ->name('rekap.varfor.varforPdf');
        Route::get('rekap/rekap-akhir', [RekapController::class, 'rekapakhir'])
            ->name('rekap.rekapakhir');
        Route::get('rekap/rekap-akhir/pbb-danton/{id}', [RekapController::class, 'rekappbbdanton'])
            ->name('rekap.rekappbbdanton');
        Route::get('rekap/rekap-akhir/varfor/{id}', [RekapController::class, 'rekapvarfor']) 
            ->name('rekap.rekapvarfor');
        // Foto dan Rekomendasi
        Route::get('administrasi/foto', [FotoController::class, 'index'])
            ->name('foto.index');
        Route::put('administrasi/foto/{foto}', [FotoController::class, 'update'])
            ->name('foto.update');
        // Profil
        Route::get('pengguna/profile', [ProfileController::class, 'index'])
            ->name('profile.index');
        Route::put('pengguna/profile/{user}', [ProfileController::class, 'update'])
            ->name('profile.update');
    });