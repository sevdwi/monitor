@extends('layouts.app')
@section('title', 'Laporan')
@section('dashboard')
    <div class="ui container" style="margin-top: 2rem;">
        <h2 class="ui header">Dashboard User</h2>

        <div class="ui form">
            <div class="two fields">
                <div class="field">
                    <label>Pilih User</label>
                    <select id="user-select" class="ui dropdown">
                        <option value="">-- Pilih User --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label>Pilih Bulan</label>
                    <select id="month-select" class="ui dropdown">
                        @for ($m = 1; $m <= 12; $m++)
                            <option value="{{ $m }}" {{ $m == now()->month ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($m)->format('F') }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="field">
                    <label>Pilih Tahun</label>
                    <select id="year-select" class="ui dropdown">
                        @for ($y = now()->year; $y >= now()->year - 5; $y--)
                            <option value="{{ $y }}">{{ $y }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>

        <div class="ui buttons" style="margin-bottom: 1rem;">
            <a id="export-excel" class="ui green button">Export ke Excel</a>
        </div>


        <table class="ui celled table" id="laporan-table" style="margin-top: 2rem;">
            <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Hari</th>
                <th>Deskripsi Pekerjaan</th>
            </tr>
            </thead>
            <tbody>
            <!-- Data akan dimasukkan via JavaScript -->
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.ui.dropdown').dropdown();

            function fetchLaporan() {
                const userId = $('#user-select').val();
                const month = $('#month-select').val();
                const year = $('#year-select').val();

                if (!userId) return;

                $.ajax({
                    url: '{{ route("dashboard.user.data") }}',
                    data: { user_id: userId, month, year },
                    success: function (res) {
                        console.log('Data laporan:', res.laporan);
                        const laporanMap = {};

                        res.laporan.forEach(item => {
                            laporanMap[item.tanggal] = laporanMap[item.tanggal] || [];
                            laporanMap[item.tanggal].push(item.deskripsi);
                        });

                        const tbody = generateTanggalKerja(month, year, laporanMap);
                        $('#laporan-table tbody').html(tbody);
                    },
                    error: function () {
                        alert("Gagal mengambil data laporan.");
                    }
                });


            }

            function formatTanggal(date) {
                const d = String(date.getDate()).padStart(2, '0');
                const m = String(date.getMonth() + 1).padStart(2, '0');
                const y = date.getFullYear();
                return `${d}-${m}-${y}`;
            }

            function generateTanggalKerja(month, year, laporanMap) {
                const daysInMonth = new Date(year, month, 0).getDate();
                let html = '';
                let no = 1;

                for (let day = 1; day <= daysInMonth; day++) {
                    const date = new Date(year, month - 1, day);
                    const dayOfWeek = date.getDay(); // 0: Minggu, 6: Sabtu
                    const isoDate = date.getFullYear() + '-' +
                        String(date.getMonth() + 1).padStart(2, '0') + '-' +
                        String(date.getDate()).padStart(2, '0');
                    const hari = date.toLocaleDateString('id-ID', { weekday: 'long' });
                    const tanggalFormatted = formatTanggal(date);

                    let deskripsi = '-';

                    if (dayOfWeek === 0 || dayOfWeek === 6) {
                        deskripsi = 'Libur';
                    } else if (laporanMap[isoDate]) {
                        deskripsi = laporanMap[isoDate].join('; ');
                    }

                    html += `<tr>
                        <td>${no++}</td>
                        <td>${tanggalFormatted}</td>
                        <td>${hari}</td>
                        <td>${deskripsi}</td>
                    </tr>`;
                }

                return html;
            }

            $('#user-select, #month-select, #year-select').change(fetchLaporan);
            fetchLaporan(); // initial load

            $('#export-excel').click(function () {
                const userId = $('#user-select').val();
                const month = $('#month-select').val();
                const year = $('#year-select').val();

                if (!userId || !month || !year) {
                    alert('Pilih user, bulan, dan tahun terlebih dahulu.');
                    return;
                }

                const url = `{{ route('dashboard.export') }}?user_id=${userId}&month=${month}&year=${year}`;
                window.open(url, '_blank');
            });

        });
    </script>
@endpush

