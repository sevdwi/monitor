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
                                   data-penggunaan-perangkat="{{ $laporan->penggunaan_perangkat ? '1' : '0' }}"
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
                                    @php
                                        $ext = pathinfo($laporan->bukti_dukung, PATHINFO_EXTENSION);
                                    @endphp

                                    @if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png']))
                                        <img
                                            class="ui tiny image bukti-image"
                                            src="{{ asset('storage/' . $laporan->bukti_dukung) }}"
                                            alt="Bukti"
                                            style="cursor: pointer;"
                                            data-src="{{ asset('storage/' . $laporan->bukti_dukung) }}"
                                        >
                                    @elseif(strtolower($ext) === 'pdf')
                                        <a href="{{ asset('storage/' . $laporan->bukti_dukung) }}" target="_blank">
                                            <i class="file pdf icon"></i> Lihat PDF
                                        </a>
                                    @endif
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
                                    @if ($laporan->perangkat && $laporan->status_perangkat)
                                        {{ $laporan->perangkat }}<br>
                                        <em>({{ ucfirst($laporan->status_perangkat) }})</em>
                                    @else
                                        -
                                    @endif
                                @else
                                    -
                                @endif

                            </td>
                            <td>
                                @foreach ($laporan->pics as $pic)
                                    <div class="ui image label">
{{--                                        <img src="{{ asset('storage/images/avatar/small/elliot.jpg') }}" alt="Avatar">--}}
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
                    <div class="field {{ $errors->has('status_pekerjaan') ? 'error' : '' }}">
                        <label>Status</label>
                        <select class="ui fluid dropdown" name="status_pekerjaan" required>
                            <option value="">Pilih Status</option>
                            <option value="belum" {{ old('status_pekerjaan') == 'belum' ? 'selected' : '' }}>Belum Selesai</option>
                            <option value="proses" {{ old('status_pekerjaan') == 'proses' ? 'selected' : '' }}>Dalam Proses</option>
                            <option value="selesai" {{ old('status_pekerjaan') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="tertunda" {{ old('status_pekerjaan') == 'tertunda' ? 'selected' : '' }}>Tertunda</option>
                        </select>
                        @error('status_pekerjaan')
                        <div class="ui pointing red basic label">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field {{ $errors->has('mulai_pekerjaan') ? 'error' : '' }}">
                        <label>Mulai</label>
                        <div class="ui calendar" id="modal-start-calendar">
                            <div class="ui input left icon">
                                <input type="text" name="mulai_pekerjaan" value="{{ old('mulai_pekerjaan') }}" placeholder="Date/Time" required>
                                <i class="calendar icon"></i>
                            </div>
                        </div>
                        @error('mulai_pekerjaan')
                        <div class="ui pointing red basic label">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field {{ $errors->has('selesai_pekerjaan') ? 'error' : '' }}">
                        <label>Selesai</label>
                        <div class="ui calendar" id="modal-stop-calendar">
                            <div class="ui input left icon">
                                <input type="text" name="selesai_pekerjaan" value="{{ old('selesai_pekerjaan') }}" placeholder="Date/Time">
                                <i class="calendar icon"></i>
                            </div>
                        </div>
                        @error('selesai_pekerjaan')
                        <div class="ui pointing red basic label">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="field {{ $errors->has('deskripsi') ? 'error' : '' }}">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" rows="3" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                    <div class="ui pointing red basic label">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field {{ $errors->has('bukti_dukung') ? 'error' : '' }}">
                    <label>Bukti Dukung</label>
                    <input type="file" name="bukti_dukung" accept=".jpg,.jpeg,.png,.pdf">
                    @error('bukti_dukung')
                    <div class="ui pointing red basic label">{{ $message }}</div>
                    @enderror
                    <input type="url" name="bukti_url" placeholder="Link (opsional)" value="{{ old('bukti_url') }}" style="margin-top: 0.5em;">
                </div>

                <h4 class="ui dividing header">Detail Instansi & Lokasi</h4>
                <div class="three fields">
                    <div class="field {{ $errors->has('opd') ? 'error' : '' }}">
                        <label>OPD</label>
                        <select class="ui fluid dropdown" name="opd" required>
                            <option value="">Pilih OPD</option>
                            @foreach($opds as $opd)
                                <option value="{{ $opd->id }}" {{ old('opd') == $opd->id ? 'selected' : '' }}>{{ $opd->nama }}</option>
                            @endforeach
                        </select>
                        @error('opd')
                        <div class="ui pointing red basic label">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field {{ $errors->has('lokasi') ? 'error' : '' }}">
                        <label>Lokasi</label>
                        <select class="ui fluid dropdown" name="lokasi" id="lokasi-dropdown" required>
                            <option value="">Pilih Lokasi</option>
                            {{-- Dynamic via JS --}}
                        </select>
                        @error('lokasi')
                        <div class="ui pointing red basic label">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field {{ $errors->has('kategori') ? 'error' : '' }}">
                        <label>Kategori</label>
                        <select class="ui fluid dropdown" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="administrasi" {{ old('kategori') == 'administrasi' ? 'selected' : '' }}>Administrasi</option>
                            <option value="aplikasi" {{ old('kategori') == 'aplikasi' ? 'selected' : '' }}>Aplikasi</option>
                            <option value="infrastruktur" {{ old('kategori') == 'infrastruktur' ? 'selected' : '' }}>Infrastruktur</option>
                            <option value="jaringan" {{ old('kategori') == 'jaringan' ? 'selected' : '' }}>Jaringan</option>
                        </select>
                        @error('kategori')
                        <div class="ui pointing red basic label">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h4 class="ui dividing header">Analisis & Solusi</h4>
                <div class="two fields">
                    <div class="field {{ $errors->has('analisis_masalah') ? 'error' : '' }}">
                        <label>Analisis Masalah</label>
                        <textarea name="analisis_masalah" rows="3" placeholder="Analisis masalah">{{ old('analisis_masalah') }}</textarea>
                        @error('analisis_masalah')
                        <div class="ui pointing red basic label">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field {{ $errors->has('solusi') ? 'error' : '' }}">
                        <label>Solusi</label>
                        <textarea name="solusi" rows="3" placeholder="Solusi yang diberikan">{{ old('solusi') }}</textarea>
                        @error('solusi')
                        <div class="ui pointing red basic label">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="ui segment">
                    <div class="field">
                        <div class="ui toggle checkbox {{ $errors->has('penggunaan_perangkat') ? 'error' : '' }}">
                            <input type="hidden" name="penggunaan_perangkat" value="0">
                            <input id="toggle-perangkat" type="checkbox" name="penggunaan_perangkat" tabindex="0" class="hidden" value="1" {{ old('penggunaan_perangkat') ? 'checked' : '' }}>
                            <label>Melakukan pergantian perangkat</label>
                        </div>
                        @error('penggunaan_perangkat')
                        <div class="ui pointing red basic label">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field {{ $errors->has('perangkat') ? 'error' : '' }}">
                        <label>Perangkat Digunakan</label>
                        <input id="input-perangkat" type="text" name="perangkat" placeholder="Hardware" value="{{ old('perangkat') }}" {{ old('penggunaan_perangkat') ? '' : 'disabled' }}>
                        @error('perangkat')
                        <div class="ui pointing red basic label">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="inline fields {{ $errors->has('status_perangkat') ? 'error' : '' }}" id="radio-perangkat" style="{{ old('penggunaan_perangkat') ? '' : 'opacity: 0.5; pointer-events: none;' }}">
                        <label>Status Perangkat</label>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="status_perangkat" value="baru" {{ old('status_perangkat') == 'baru' ? 'checked' : '' }} {{ old('penggunaan_perangkat') ? '' : 'disabled' }}>
                                <label>Baru</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="status_perangkat" value="bekas" {{ old('status_perangkat') == 'bekas' ? 'checked' : '' }} {{ old('penggunaan_perangkat') ? '' : 'disabled' }}>
                                <label>Bekas</label>
                            </div>
                        </div>
                        @error('status_perangkat')
                        <div class="ui pointing red basic label" style="margin-left: 1em;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h4 class="ui dividing header">Tim yang Terlibat</h4>
                <div class="two fields">
                    <div class="field {{ $errors->has('pic') ? 'error' : '' }}">
                        <label>PIC</label>
                        <select class="ui fluid multiple search dropdown" id="pic" name="pic[]" multiple>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ collect(old('pic'))->contains($user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('pic')
                        <div class="ui pointing red basic label">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field {{ $errors->has('kolaborator') ? 'error' : '' }}">
                        <label>Kolaborator</label>
                        <select class="ui fluid multiple search dropdown" name="kolaborator[]" multiple>
                            @foreach($kolaborators as $kolab)
                                <option value="{{ $kolab->id }}" {{ collect(old('kolaborator'))->contains($kolab->id) ? 'selected' : '' }}>
                                    {{ $kolab->nama }} ({{ $kolab->instansi }})
                                </option>
                            @endforeach
                        </select>
                        @error('kolaborator')
                        <div class="ui pointing red basic label">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <input type="hidden" name="created_by" id="created_by">
                <button type="submit" class="ui primary button">Simpan</button>
            </form>
        </div>
    </div>



@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const $form = $('#laporanForm');
            const $modal = $('#laporanModal').modal({
                 onHidden: function () {
                     $('#laporanForm')[0].reset();
                     $('#laporanForm').form('reset');
                     $('#laporanForm .ui.dropdown').dropdown('clear');
                     $('#laporanForm .field').removeClass('error');
                     $('#laporanForm .ui.basic.label').remove();
                     $('#laporanForm input[type=hidden]').val('');
                 }
            });
            const $lokasiDropdown = $('#lokasi-dropdown');

            // Init dropdowns & calendar
            $('.ui.dropdown').dropdown();
            $('#modal-start-calendar, #modal-stop-calendar').calendar({ type: 'datetime' });

            // Gambar preview
            $('.bukti-image').on('click', function (e) {
                console.log('Clicked image, laporanModal active?', $('#laporanModal').hasClass('active'));

                if ($('#laporanModal').hasClass('active')) return;

                const imgSrc = $(this).data('src');
                $('#modal-image').attr('src', imgSrc);
                $('#image-modal').modal('show');
            });

            // Toggle perangkat
            $('#toggle-perangkat').on('change', function () {
                const isChecked = $(this).is(':checked');
                $('#input-perangkat').prop('disabled', !isChecked);
                $('#radio-perangkat').css({ opacity: isChecked ? 1 : 0.5, 'pointer-events': isChecked ? 'auto' : 'none' });
                $('input[name="status_perangkat"]').prop('disabled', !isChecked);
            });

            // Ganti OPD -> Load Lokasi
            $('select[name="opd"]').on('change', function () {
                const opdId = $(this).val();
                $lokasiDropdown.html('<option>Memuat lokasi...</option>').prop('disabled', true);

                if (!opdId) return;

                $.get(`/lokasi/by-opd/${opdId}`, function (res) {
                    let options = '<option value="">Pilih Lokasi</option>';
                    res.forEach(l => options += `<option value="${l.id}">${l.nama}</option>`);
                    $lokasiDropdown.html(options).prop('disabled', false).dropdown('refresh');
                });
            });

            // Edit
            $('.a-edit-laporan').on('click', function (e) {
                e.preventDefault();
                const d = $(this).data();

                $form[0].reset();
                $('.ui.dropdown').dropdown('clear');
                $('#form-method').val('PUT');
                $('#laporan-id').val(d.id);
                $('#modal-title').text('Edit Laporan');
                $form.attr('action', `/lapor/${d.id}`);

                $('[name="status_pekerjaan"]').dropdown('set selected', d.status);
                $('[name="mulai_pekerjaan"]').val(d.mulai);
                $('[name="selesai_pekerjaan"]').val(d.selesai);
                $('[name="deskripsi"]').val(d.deskripsi);
                $('[name="kategori"]').dropdown('set selected', d.kategori);
                $('[name="opd"]').dropdown('set selected', d.opd);
                $('[name="analisis_masalah"]').val(d.analisis);
                $('[name="solusi"]').val(d.solusi);

                // Perangkat
                const perangkatUsed = d.penggunaanPerangkat == 1 || d.penggunaanPerangkat === '1' || d.penggunaanPerangkat === true;
                if (perangkatUsed) {
                    $('#toggle-perangkat').prop('checked', true);
                    $('#toggle-perangkat').closest('.checkbox').checkbox('set checked');
                } else {
                    $('#toggle-perangkat').prop('checked', false);
                    $('#toggle-perangkat').closest('.checkbox').checkbox('set unchecked');
                }
                $('#input-perangkat').val(d.perangkat).prop('disabled', !perangkatUsed);
                $('#radio-perangkat').css({ opacity: perangkatUsed ? 1 : 0.5, 'pointer-events': perangkatUsed ? 'auto' : 'none' });
                $('input[name="status_perangkat"]').prop('disabled', !perangkatUsed);
                if (perangkatUsed) $(`input[name="status_perangkat"][value="${d.statusPerangkat}"]`).prop('checked', true);

                // PICs & Kolaborator
                $('select[name="pic[]"]').dropdown('set selected', String(d.pics).split(','));
                $('select[name="kolaborator[]"]').dropdown('set selected', String(d.kolaborators).split(','));

                // Ambil lokasi dari OPD
                $.get(`/lokasi/by-opd/${d.opd}`, function (res) {
                    let options = '<option value="">Pilih Lokasi</option>';
                    res.forEach(l => options += `<option value="${l.id}">${l.nama}</option>`);
                    $lokasiDropdown.html(options).prop('disabled', false).dropdown('refresh').dropdown('set selected', d.lokasi);
                });

                $modal.modal({ autofocus: false }).modal('show');
            });

            // Toast Error Laravel
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            $('body').toast({ class: 'error', message: {!! json_encode($error) !!}, displayTime: 5000 });
            @endforeach
            $modal.modal('show');
            @endif

            // Toast Session
            @if(session('success'))
            $('body').toast({ class: 'success', message: '{{ session('success') }}' });
            @endif
            @if(session('error'))
            $('body').toast({ class: 'error', message: '{{ session('error') }}' });
            @endif

            // Auto set created_by = PIC pertama
            $('#pic').on('change', function () {
                const selected = $(this).val();
                $('#created_by').val(selected.length > 0 ? selected[0] : '');
            }).trigger('change');
        });

        $form.on('submit', function() {
            console.log("Penggunaan perangkat:", $('#toggle-perangkat').is(':checked'));
        });

    </script>
@endpush


