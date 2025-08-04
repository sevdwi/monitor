<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanBulananExport implements FromView
{
    protected $userId;
    protected $month;
    protected $year;

    public function __construct($userId, $month, $year)
    {
        $this->userId = $userId;
        $this->month = $month;
        $this->year = $year;
    }

    public function view(): View
    {
        $user = User::find($this->userId);

        $laporanCollection = $user->laporanDibuat
            ->merge($user->laporanPIC)
            ->unique('id')
            ->filter(function ($laporan) {
                return $laporan->mulai_pekerjaan &&
                    $laporan->mulai_pekerjaan->format('Y') == $this->year &&
                    $laporan->mulai_pekerjaan->format('n') == $this->month;
            })
            ->groupBy(function ($item) {
                return $item->mulai_pekerjaan->format('Y-m-d');
            });

        return view('exports.laporan_bulanan', [
            'laporanMap' => $laporanCollection,
            'user' => $user,
            'month' => $this->month,
            'year' => $this->year
        ]);
    }
}
