<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OPD extends Model
{
    use HasFactory;
    protected $table = 'opds';
    protected $fillable = ['nama', 'kode'];

    public function lokasis() {
        return $this->hasMany(Lokasi::class);
    }

    public function laporans() {
        return $this->hasMany(Laporan::class);
    }
}
