<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Main\BarangController;
use App\Http\Controllers\Main\JabatanController;
use App\Http\Controllers\Main\JenisBarangController;
use App\Http\Controllers\Main\MobilController;
use App\Http\Controllers\Main\LogistikController;
use App\Http\Controllers\Main\JenisKebutuhanController;
use App\Http\Controllers\Main\KelompokController;
use App\Http\Controllers\Main\Laporan\PemeliharaanSarprasController;
use App\Http\Controllers\Main\Laporan\LaporanPembelianSaranaController;
use App\Http\Controllers\Main\PembelianSarprasController;
use App\Http\Controllers\Main\PeminjamanMobilController;
use App\Http\Controllers\Main\PersediaanLogistikController;
use App\Http\Controllers\Main\UsersController;
use App\Http\Controllers\Main\PengajuanSarprasController;
use App\Http\Controllers\Main\KendaraanController;
use App\Http\Controllers\Main\RuangController;
use App\Http\Controllers\Main\AtkController;
use App\Http\Controllers\Main\SaranaController;
use App\Http\Controllers\Main\SuratController;
use App\Http\Controllers\Main\Laporan\LaporanPeminjamanKendaraanController;
use App\Http\Controllers\Main\PeminjamanKendaraanController;
use App\Http\Controllers\Main\Laporan\LaporanPeminjamanRuangController;
use App\Http\Controllers\Main\PeminjamanRuangController;
use App\Http\Controllers\Main\Laporan\LaporanLampuRuanganController;
use App\Http\Controllers\Main\LampuRuanganController;
use App\Http\Controllers\Main\Laporan\LaporanPengelolaanPersuratanController;
use App\Http\Controllers\Main\PengelolaanPersuratanController;
use App\Http\Controllers\Main\Laporan\LaporanPengelolaanAtkController;
use App\Http\Controllers\Main\PengelolaanAtkController;
use App\Http\Controllers\Main\Laporan\LaporanPengelolaKebersihanController;
use App\Http\Controllers\Main\Laporan\LaporanKebersihanController;
use App\Http\Controllers\Main\KebersihanController;
use App\Http\Controllers\Main\Laporan\LaporanPengelolaSaranaController;
use App\Http\Controllers\Main\PengelolaSaranaController;
use App\Http\Controllers\Main\PembelianSaranaController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/auth/login');
Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'processLogin']);
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'processRegister']);
});
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::prefix('main')->middleware('auth')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');

    // user
    Route::resource('user', UsersController::class);
    // jabatan
    Route::resource('jabatan', JabatanController::class);

    // Route::get('user', [UserController::class, 'index'])->name('user');
    // Route::get('user/tambah', [UserController::class, 'tambah'])->name('tambah');
    // Route::post('user/simpan', [UserController::class, 'simpan'])->name('user.simpan');
    // Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    // Route::get('user/lihat/{id}', [UserController::class, 'lihat'])->name('user.lihat');
    // Route::post('user/aksi_ubah/{id}', [UserController::class, 'aksi_ubah'])->name('user.aksi_ubah');
    // Route::get('user/hapus/{id}', [UserController::class, 'hapus'])->name('user.hapus');

    // mobil
    Route::resource('mobil', MobilController::class);
    // logistik
    Route::resource('logistik', LogistikController::class);

    // jenis kebutuhan
    Route::resource('jenis_kebutuhan', JenisKebutuhanController::class);
    // jenis barang
    Route::resource('jenis_barang', JenisBarangController::class);
    // barang
    Route::resource('barang', BarangController::class);
    // kelompok
    Route::resource('kelompok', KelompokController::class);
    // laporan pemeliharaan sarpras
    Route::resource('laporan/pemeliharaan', PemeliharaanSarprasController::class);
    Route::post('laporan/pemeliharaan/print', [PemeliharaanSarprasController::class, 'print'])->name('pemeliharaan.print');
    // Pengajuan Persediaan Logistik
    Route::resource('permintaan_logistik', PersediaanLogistikController::class);
    // Pengajuan Peminjaman Mobil
    Route::resource('pemeliharaan_sarpras', PengajuanSarprasController::class);
    // Pengajuan Peminjaman Mobil
    Route::resource('peminjaman_mobil', PeminjamanMobilController::class);
    // kendaraan
    Route::resource('kendaraan', KendaraanController::class);
    // ruang
    Route::resource('ruang', RuangController::class);
    // atk
    Route::resource('atk', AtkController::class);
    // sarana
    Route::resource('sarana', SaranaController::class);
    // surat
    Route::resource('surat', SuratController::class);
    // Laporan Peminjaman Kendaraan
    Route::post('laporan/peminjaman_kendaraan/print', [LaporanPeminjamanKendaraanController::class, 'print'])->name('peminjaman_kendaraan.print');
    Route::resource('laporan/peminjaman_kendaraan', LaporanPeminjamanKendaraanController::class);
    // Pengajuan Peminjaman Kendaraan
    Route::resource('peminjaman_kendaraan', PeminjamanKendaraanController::class);
    // Laporan Peminjaman Ruang
    Route::resource('laporan/peminjaman_ruang', LaporanPeminjamanRuangController::class);
    Route::post('laporan/peminjaman_ruang/print', [LaporanPeminjamanRuangController::class, 'print'])->name('peminjaman_ruang.print');
    // Pengajuan Peminjaman Ruang
    Route::resource('peminjaman_ruang', PeminjamanRuangController::class);
    // Laporan Lampu Ruangan
    Route::post('laporan/lampu_ruangan/print', [LaporanLampuRuanganController::class, 'print'])->name('lampu_ruangan.print');
    Route::resource('laporan/lampu_ruangan', LaporanLampuRuanganController::class);
    // Pengajuan Peminjaman Ruang
    Route::resource('lampu_ruangan', LampuRuanganController::class);
    // Laporan Pengelolaan Persuratan
    Route::post('laporan/pengelolaan_persuratan/print', [LaporanPengelolaanPersuratanController::class, 'print'])->name('pengelolaan_persuratan.print');
    Route::resource('laporan/pengelolaan_persuratan', LaporanPengelolaanPersuratanController::class);
    // Pengajuan Pengelolaan persuratan
    Route::resource('pengelolaan_persuratan', PengelolaanPersuratanController::class);
    // Laporan Pengelolaan Atk
    Route::post('laporan/pengelolaan_atk/print', [LaporanPengelolaanAtkController::class, 'print'])->name('pengelolaan_atk.print');
    Route::resource('laporan/pengelolaan_atk', LaporanPengelolaanAtkController::class);
    // Pengajuan Pengelolaan Atk
    Route::resource('pengelolaan_atk', PengelolaanAtkController::class);
    // Laporan Kebersihan
    Route::post('laporan/kebersihan/print', [LaporanKebersihanController::class, 'print'])->name('kebersihan.print');
    Route::resource('laporan/kebersihan', LaporanKebersihanController::class);
    // Kebersihan
    Route::resource('kebersihan', KebersihanController::class);
    // Laporan Pengelolaan Atk
    Route::post('laporan/pengelola_sarana/print', [LaporanPengelolaSaranaController::class, 'print'])->name('pengelola_sarana.print');
    Route::resource('laporan/pengelola_sarana', LaporanPengelolaSaranaController::class);
    // Pengajuan Pengelolaan Atk
    Route::resource('pengelola_sarana', PengelolaSaranaController::class);
    // Pengajuan Pembelian Sarana
    Route::resource('pembelian_sarana', PembelianSaranaController::class);
});
