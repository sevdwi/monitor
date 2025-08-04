<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_pekerjaan',
        'mulai_pekerjaan',
        'selesai_pekerjaan',
        'deskripsi',
        'bukti_dukung',
        'bukti_url',
        'opd_id',
        'lokasi_id',
        'kategori',
        'analisis_masalah',
        'solusi',
        'penggunaan_perangkat',
        'perangkat',
        'status_perangkat',
        'created_by',
    ];

    protected $casts = [
        'penggunaan_perangkat' => 'boolean',
        'mulai_pekerjaan' => 'datetime',
        'selesai_pekerjaan' => 'datetime',
    ];

    public function opd() {
        return $this->belongsTo(OPD::class);
    }

    public function lokasi() {
        return $this->belongsTo(Lokasi::class);
    }

    public function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function pics()
    {
        return $this->belongsToMany(User::class, 'laporan_pic', 'laporan_id', 'user_id');
    }


    public function kolaborators()
    {
        return $this->belongsToMany(Kolaborator::class, 'laporan_kolaborator', 'laporan_id', 'kolaborator_id');
    }


}
