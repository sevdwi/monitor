<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'koordinat', 'opd_id'];

    public function opd() {
        return $this->belongsTo(OPD::class);
    }

    public function laporans() {
        return $this->hasMany(Laporan::class);
    }
}
