<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Hari</th>
        <th>Deskripsi</th>
    </tr>
    </thead>
    <tbody>
    @php
        use Carbon\Carbon;
        $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;
        $no = 1;
    @endphp
    @for ($day = 1; $day <= $daysInMonth; $day++)
        @php
            $tanggal = Carbon::createFromDate($year, $month, $day);
            $isoDate = $tanggal->format('Y-m-d');
            $deskripsi = '-';
            if ($tanggal->isWeekend()) {
                $deskripsi = 'Libur';
            } elseif (isset($laporanMap[$isoDate])) {
                $deskripsi = $laporanMap[$isoDate]->pluck('deskripsi')->implode('; ');
            }
        @endphp
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $tanggal->format('d-m-Y') }}</td>
            <td>{{ $tanggal->translatedFormat('l') }}</td>
            <td>{{ $deskripsi }}</td>
        </tr>
    @endfor
    </tbody>
</table>
