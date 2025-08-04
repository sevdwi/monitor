<?php

use App\Http\Controllers\LokasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\OPDController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanBulananExport;

Route::get('/dashboard/export', function (Request $request) {
    $userId = $request->input('user_id');
    $month = $request->input('month');
    $year = $request->input('year');

    return Excel::download(new LaporanBulananExport($userId, $month, $year), 'laporan-bulanan.xlsx');
})->name('dashboard.export');


// routes/web.php
Route::get('/lokasi/by-opd/{id}', function ($id) {
    $lokasi = \App\Models\Lokasi::where('opd_id', $id)->get(['id', 'nama']);
    return response()->json($lokasi);
});



//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard-user-data', [UserDashboardController::class, 'fetchData'])->name('dashboard.user.data');


Route::get('/', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/lapor', [LaporanController::class, 'create'])->name('lapor.create');
Route::post('/lapor/store', [LaporanController::class, 'store'])->name('lapor.store');
Route::get('/lapor/{id}/edit', [LaporanController::class, 'edit'])->name('lapor.edit');
Route::put('/lapor/{id}', [LaporanController::class, 'update'])->name('lapor.update');



Route::get('/lokasi/create', [LokasiController::class, 'create'])->name('lokasi.create');
Route::post('/lokasi/store', [LokasiController::class, 'store'])->name('lokasi.store');

Route::get('/opd', [OPDController::class, 'index'])->name('opd.index');
Route::get('/opd/create', [OPDController::class, 'create'])->name('opd.create');
Route::post('/opd/store', [OPDController::class, 'store'])->name('opd.store');

