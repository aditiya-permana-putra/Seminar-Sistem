<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CetakSuratController;
use App\Http\Controllers\UserKaryawanController;
use App\Http\Controllers\PengajuanSuratController;

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

// Route::middleware(['auth', 'preventCache', 'checkPermission:permission_name'])->group(function () {
//     // Definisikan rute Anda di sini
// });


// Route::middleware(['auth.check', 'preventCache'])->prefix('admin')->group(function ()  {

// });



Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function () {
    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //Permission
    Route::resource('permissions', \App\Http\Controllers\PermissionController::class);

    //Role
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::get('roles/{roles}/give-permissions', [RoleController::class, 'addPermissionToRole'])->name('roles.addPermissionToRole');
    Route::put('roles/{roles}/give-permissions', [RoleController::class, 'givePermissionToRole'])->name('roles.givePermissionToRole');

    //User
    Route::resource('users', \App\Http\Controllers\UserController::class);

    //UserKaryawan
    Route::resource('unit', \App\Http\Controllers\UserKaryawanController::class);
    //User & Tanda Tangan
    // Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::get('/signature/form',  [UserKaryawanController::class, 'showSignatureForm'])->name('signature.form');
    Route::post('/signature/save',  [UserKaryawanController::class, 'saveSignature'])->name('signature.save');

    //Buat Surat
    Route::resource('buat-surat', \App\Http\Controllers\BuatSuratController::class);

    //Pengajuan Surat
    Route::resource('pengajuan-surat', \App\Http\Controllers\PengajuanSuratController::class);
    Route::put('/surat/{id}', [PengajuanSuratController::class, 'update'])->name('surat.update');
    Route::post('/surat/{id}/upload-pdf', [PengajuanSuratController::class, 'uploadPdf'])->name('upload-pdf');
    Route::post('barang/{id}/reject', [PengajuanSuratController::class, 'rejectBarang'])->name('barang.reject');
    Route::post('barang/{id}/approve', [PengajuanSuratController::class, 'approveBarang'])->name('barang.approve');
    Route::post('barang/{id}/approvekabid', [PengajuanSuratController::class, 'approveBarangkabid'])->name('barang.approvekabid');
    Route::post('barang/{id}/rejectkabid', [PengajuanSuratController::class, 'rejectBarangkabid'])->name('barang.rejectkabid');
    Route::post('surat/disposisi/{id}', [PengajuanSuratController::class, 'disposisi'])->name('disposisi-surat');



    //Proses Kabid
    Route::resource('proses-kabid', \App\Http\Controllers\ProsesKabidController::class);

    //Proses Kabid
    Route::resource('proses-manager', \App\Http\Controllers\ProsesManagerController::class);

    //cetak surat
    Route::resource('cetak-surat', \App\Http\Controllers\CetakSuratController::class);


    //riwayat Surat
    Route::resource('riwayat-surat', \App\Http\Controllers\RiwayatSuratController::class);


    //Cetak Surat
    Route::post('cetak-surat/{id}', [CetakSuratController::class, 'cetak'])->name('cetak-surat.cetak');
    Route::post('cetak-surat/disposisi/{id}', [CetakSuratController::class, 'cetakdisposisi'])->name('cetak-surat.cetakdisposisi');

    Route::get('/cetak-diposisi', [CetakSuratController::class, 'indexx'])->name('disposisi.index');

});
