@extends('layouts.app')

@section('title', 'Daftar Laporan')

@section('tabel')
    <div class="ui middle aligned stackable grid container">
        <div class="row">
            <div class="center aligned column">
                <table id="laporan" class="ui celled padded table">
                    <thead>
                    <tr>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Lokasi</th>
                        <th>Analisa</th>
                        <th>Solusi</th>
                        <th>Status</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Bukti Dukung</th>
                        <th>Kebutuhan Perangkat</th>
                        <th>Petugas</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($laporans as $laporan)
                        <tr>
                            <td>
                                <a href="#"
                                   class="a-edit-laporan"
                                   data-id="{{ $laporan->id }}"
                                   data-status="{{ $laporan->status_pekerjaan }}"
                                   data-mulai="{{ $laporan->mulai_pekerjaan }}"
                                   data-selesai="{{ $laporan->selesai_pekerjaan }}"
                                   data-deskripsi="{{ $laporan->deskripsi }}"
                                   data-opd="{{ $laporan->opd_id }}"
                                   data-lokasi="{{ $laporan->lokasi_id }}"
                                   data-kategori="{{ $laporan->kategori }}"
                                   data-analisis="{{ $laporan->analisis_masalah }}"
                                   data-solusi="{{ $laporan->solusi }}"
                                   data-perangkat="{{ $laporan->perangkat }}"
                                   data-status-perangkat="{{ $laporan->status_perangkat }}"
                                   data-penggunaan-perangkat="{{ $laporan->penggunaan_perangkat }}"
                                   data-pics="{{ $laporan->pics->pluck('id')->implode(',') }}"
                                   data-kolaborators="{{ $laporan->kolaborators->pluck('id')->implode(',') }}"
                                >
                                    <h2 class="ui center aligned header">{{ strtoupper(substr($laporan->kategori, 0, 1)) }}</h2>
                                </a>
                            </td>
                            <td>{{ $laporan->created_at->format('d M Y') }}</td>
                            <td>{{ $laporan->deskripsi }}</td>
                            <td class="right aligned">
                                <strong>{{ $laporan->opd->nama ?? '-' }}</strong><br>
                                <span>{{ $laporan->lokasi->nama ?? '-' }}</span>
                            </td>
                            <td>{{ $laporan->analisis_masalah ?? '-' }}</td>
                            <td>{{ $laporan->solusi ?? '-' }}</td>
                            <td>
                                @php
                                    $status = $laporan->status_pekerjaan;
                                    $labelColor = match($status) {
                                        'belum' => 'red',
                                        'proses' => 'yellow',
                                        'tertunda' => 'grey',
                                        'selesai' => 'green',
                                        default => 'black'
                                    };
                                @endphp
                                <span class="ui {{ $labelColor }} label">{{ ucfirst($status) }}</span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($laporan->mulai_pekerjaan)->format('D, d M Y - H:i') }}</td>
                            <td>
                                {{ $laporan->selesai_pekerjaan
                                    ? \Carbon\Carbon::parse($laporan->selesai_pekerjaan)->format('D, d M Y - H:i')
                                    : '-' }}
                            </td>
                            <td class="center aligned">
                                @if ($laporan->bukti_dukung)
                                    <img
                                        class="ui tiny image bukti-image"
                                        src="{{ asset('storage/' . $laporan->bukti_dukung) }}"
                                        alt="Bukti"
                                        style="cursor: pointer;"
                                        data-src="{{ asset('storage/' . $laporan->bukti_dukung) }}"
                                    >
                                @endif

                                @if ($laporan->bukti_url)
                                    <br>
                                    <a href="{{ $laporan->bukti_url }}" target="_blank">Lihat Link</a>
                                @endif

                                @if (!$laporan->bukti_dukung && !$laporan->bukti_url)
                                    -
                                @endif
                            </td>


                            <td>
                                @if ($laporan->penggunaan_perangkat)
                                    {{ $laporan->perangkat }}<br>
                                    <em>({{ ucfirst($laporan->status_perangkat) }})</em>
                                @else
                                    Tidak ada
                                @endif
                            </td>
                            <td>
                                @foreach ($laporan->pics as $pic)
                                    <div class="ui image label">
                                        <img src="{{ asset('storage/images/avatar/small/elliot.jpg') }}" alt="Avatar">
                                        {{ $pic->name }}
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    @empty
{{--                        <tr><td colspan="12" class="center aligned">Belum ada data laporan.</td></tr>--}}
                    @endforelse
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="ui modal" id="image-modal">
        <div class="content" style="text-align: center;">
            <img id="modal-image" src="" style="max-width: 100%; height: auto;" alt="Bukti Gambar">
        </div>
    </div>

    @if ($errors->any())
        <script>
            $(document).ready(function() {
                @foreach ($errors->all() as $error)
                $('body').toast({
                    message: {!! json_encode($error) !!},
                    showIcon: 'exclamation circle',
                    class: 'error',
                    displayTime: 5000
                });
                @endforeach
            });
        </script>
    @endif


    <div class="ui modal" id="laporanModal">
        <i class="close icon"></i>
        <div class="header">
            <span id="modal-title">Tambah Laporan</span>
        </div>
        <div class="scrolling content">
            <form id="laporanForm" class="ui form" method="POST" action="{{ route('lapor.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" id="form-method" value="POST">
                <input type="hidden" name="laporan_id" id="laporan-id">

                <h4 class="ui dividing header">Informasi Pekerjaan</h4>
                <div class="three fields">
                    <div class="field">
                        <label>STATUS</label>
                        <select class="ui fluid dropdown" name="status_pekerjaan" required>
                            <option value="">Pilih Status</option>
                            <option value="belum">Belum Selesai</option>
                            <option value="proses">Dalam Proses</option>
                            <option value="selesai">Selesai</option>
                            <option value="tertunda">Tertunda</option>
                        </select>
                    </div>
                    <div class="field">
                        <label>MULAI</label>
                        <div class="ui medium calendar" id="modal-start-calendar">
                            <div class="ui fluid input left icon">
                                <input type="text" name="mulai_pekerjaan" placeholder="Date/Time" autocomplete="off" required>
                                <i class="calendar icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>SELESAI</label>
                        <div class="ui medium calendar" id="modal-stop-calendar">
                            <div class="ui fluid input left icon">
                                <input type="text" name="selesai_pekerjaan" placeholder="Date/Time" autocomplete="off">
                                <i class="calendar icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label>DESKRIPSI</label>
                    <textarea name="deskripsi" rows="3" placeholder="Deskripsi pekerjaan" required></textarea>
                </div>

                <div class="field">
                    <label>BUKTI DUKUNG</label>
                    <input type="file" name="bukti_dukung" accept=".jpg,.jpeg,.png,.pdf">
                    <input type="url" name="bukti_url" placeholder="Link (opsional)" style="margin-top: 0.5em;">
                </div>

                <h4 class="ui dividing header">Detail Instansi & Lokasi</h4>
                <div class="three fields">
                    <div class="field">
                        <label>OPD</label>
                        <select class="ui fluid dropdown" name="opd" required>
                            <option value="">Pilih OPD</option>
                            @foreach($opds as $opd)
                                <option value="{{ $opd->id }}">{{ $opd->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label>LOKASI</label>
                        <select class="ui fluid dropdown" name="lokasi" id="lokasi-dropdown" required>
                            <option value="">Pilih Lokasi</option>
                            {{-- Ini akan diisi via JS --}}
                        </select>
                    </div>

                    <div class="field">
                        <label>KATEGORI</label>
                        <select class="ui fluid dropdown" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="aplikasi">Aplikasi</option>
                            <option value="infrastruktur">Infrastruktur</option>
                            <option value="jaringan">Jaringan</option>
                        </select>
                    </div>
                </div>

                <h4 class="ui dividing header">Analisis & Solusi</h4>
                <div class="two fields">
                    <div class="field">
                        <label>ANALISIS MASALAH</label>
                        <textarea name="analisis_masalah" rows="3" placeholder="Analisis masalah"></textarea>
                    </div>
                    <div class="field">
                        <label>SOLUSI</label>
                        <textarea name="solusi" rows="3" placeholder="Solusi yang diberikan"></textarea>
                    </div>
                </div>

                <div class="ui segment">
                    <div class="field">
                        <div class="ui toggle checkbox">
                            <input type="hidden" name="penggunaan_perangkat" value="0">
                            <input id="toggle-perangkat" type="checkbox" name="penggunaan_perangkat" tabindex="0" class="hidden" value="1">
                            <label>Melakukan pergantian perangkat</label>
                        </div>
                    </div>
                    <div class="field">
                        <label>Perangkat Digunakan</label>
                        <input id="input-perangkat" type="text" name="perangkat" placeholder="Hardware" disabled>
                    </div>

                    <div class="inline fields" id="radio-perangkat" style="opacity: 0.5; pointer-events: none;">
                        <label>Status Perangkat</label>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="status_perangkat" value="baru" disabled>
                                <label>Baru</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="status_perangkat" value="bekas" disabled>
                                <label>Bekas</label>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="ui dividing header">Tim yang Terlibat</h4>
                <div class="two fields">
                    <div class="field">
                        <label>PIC</label>
                        <select class="ui fluid multiple search dropdown" name="pic[]" multiple>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label>Kolaborator</label>
                        <select class="ui fluid multiple search dropdown" name="kolaborator[]" multiple>
                            @foreach($kolaborators as $kolab)
                                <option value="{{ $kolab->id }}">{{ $kolab->nama }} ({{ $kolab->instansi }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="ui primary button">Simpan</button>
            </form>
        </div>
    </div>



@endsection

@push('scripts')
    <script>
        $('.bukti-image').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            if ($('#laporanModal').hasClass('visible') || $('#laporanModal').is(':visible')) {
                return; // Jangan buka modal gambar kalau modal form terbuka
            }

            const imgSrc = $(this).data('src');
            $('#modal-image').attr('src', imgSrc);
            $('#image-modal').modal('show');
        });

    </script>

    <script>
            $(document).ready(function () {
                // Inisialisasi kalender & dropdown
                $('.ui.dropdown').dropdown();
                $('#modal-start-calendar').calendar({ type: 'datetime' });
                $('#modal-stop-calendar').calendar({ type: 'datetime' });

                // Buka modal untuk create
                @if ($errors->any())
                resetForm();
                $('#laporanForm').attr('action', '{{ route('lapor.store') }}');
                $('#form-method').val('POST');
                $('#modal-title').text('Tambah Laporan');
                $('#laporanModal').modal({
                    autofocus: false,
                    observeChanges: false,
                    onHidden: function() {
                        // Tutup modal gambar jika terbuka
                        if ($('#image-modal').hasClass('visible')) {
                            $('#image-modal').modal('hide');
                        }
                    }
                }).modal('show');

                $('.ui.modal .close.icon').on('click', function() {
                    $('#image-modal').modal('hide');
                });

                $('#laporanForm').on('submit', function () {
                    $(this).find('button[type="submit"]').addClass('loading disabled');
                });
                @endif

                // (Optional) Kalau ingin pakai tombol edit dalam tabel:
                $('.btn-edit-laporan').on('click', function () {
                    const data = $(this).data();

                    $('#laporan-id').val(data.id);
                    $('#status_pekerjaan').dropdown('set selected', data.status);
                    $('#mulai_pekerjaan').val(data.mulai);
                    $('#selesai_pekerjaan').val(data.selesai);
                    $('#deskripsi').val(data.deskripsi);
                    // dan field lain...

                    $('#laporanForm').attr('action', `/lapor/${data.id}`);
                    $('#form-method').val('PUT');
                    $('#modal-title').text('Edit Laporan');
                    $('#laporanModal').modal('show');
                });

                function resetForm() {
                    $('#laporanForm')[0].reset();
                    $('#laporanForm .ui.dropdown').each(function () {
                        $(this).dropdown('clear');
                    });
                    $('#form-method').val('POST');
                }

            });
        </script>

    <script>
        $('.a-edit-laporan').on('click', function (e) {
            // Cegah buka modal gambar
            e.preventDefault();
            e.stopPropagation();
            const data = $(this).data();
            // console.log('status perangkat:', data.statusPerangkat);
            // Set nilai field
            $('#laporan-id').val(data.id);
            $('select[name="status_pekerjaan"]').dropdown('set selected', data.status);
            $('input[name="mulai_pekerjaan"]').val(data.mulai);
            $('input[name="selesai_pekerjaan"]').val(data.selesai);
            $('textarea[name="deskripsi"]').val(data.deskripsi);

            $('select[name="opd"]').dropdown('set selected', data.opd);
            $('select[name="lokasi"]').dropdown('set selected', data.lokasi);
            $('select[name="kategori"]').dropdown('set selected', data.kategori);

            $('textarea[name="analisis_masalah"]').val(data.analisis);
            $('textarea[name="solusi"]').val(data.solusi);

            // Perangkat
            if (data.penggunaanPerangkat) {
                $('#toggle-perangkat').prop('checked', true).closest('.checkbox').checkbox('check');
                $('#input-perangkat').val(data.perangkat).prop('disabled', false);
                $('#radio-perangkat').css({ opacity: 1, 'pointer-events': 'auto' });
                $('input[name="status_perangkat"]').prop('disabled', false);
                $(`input[name="status_perangkat"][value="${data.statusPerangkat}"]`).prop('checked', true);
            } else {
                $('#toggle-perangkat').prop('checked', false).closest('.checkbox').checkbox('uncheck');
                $('#input-perangkat').val('').prop('disabled', true);
                $('#radio-perangkat').css({ opacity: 0.5, 'pointer-events': 'none' });
                $('input[name="status_perangkat"]').prop('checked', false).prop('disabled', true);
            }

            // === PICs (multiple dropdown)
            if (data.pics) {
                let picIds = String(data.pics).split(',').map(id => id.trim());
                $('select[name="pic[]"]').dropdown('clear').dropdown('set selected', picIds);
            }

            // === Kolaborators
            if (data.kolaborators) {
                let kolabIds = String(data.kolaborators).split(',').map(id => id.trim());
                $('select[name="kolaborator[]"]').dropdown('clear').dropdown('set selected', kolabIds);
            }

            console.log('PICs:', data.pics);
            console.log('Kolaborators:', data.kolaborators);


            // Set form action dan method
            $('#laporanForm').attr('action', `/lapor/${data.id}`);
            $('#form-method').val('PUT');

            $('#modal-title').text('Edit Laporan');
            $('#laporanModal').modal({ autofocus: false }).modal('show');
        });
    </script>

@endpush

@push('scripts')
    <script>
        $(document).ready(function () {
            @if(session('success'))
            $('body').toast({
                class: 'success',
                message: '{{ session('success') }}',
                showProgress: 'bottom',
                displayTime: 4000
            });
            @endif

            @if(session('error'))
            $('body').toast({
                class: 'error',
                message: '{{ session('error') }}',
                showProgress: 'bottom',
                displayTime: 4000
            });
            @endif
        });
    </script>

    <script>
        $('select[name="opd"]').on('change', function () {
            const opdId = $(this).val();

            // Kosongkan dan disable dropdown lokasi dulu
            const lokasiDropdown = $('#lokasi-dropdown');
            lokasiDropdown.dropdown('clear');
            lokasiDropdown.html('<option value="">Memuat lokasi...</option>');
            lokasiDropdown.prop('disabled', true);

            if (!opdId) return;

            $.ajax({
                url: `/lokasi/by-opd/${opdId}`,
                type: 'GET',
                success: function (res) {
                    let options = '<option value="">Pilih Lokasi</option>';
                    res.forEach(function (lokasi) {
                        options += `<option value="${lokasi.id}">${lokasi.nama}</option>`;
                    });
                    lokasiDropdown.html(options).prop('disabled', false);
                    lokasiDropdown.dropdown('refresh');
                },
                error: function () {
                    lokasiDropdown.html('<option value="">Gagal memuat lokasi</option>');
                }
            });
        });
    </script>
@endpush

