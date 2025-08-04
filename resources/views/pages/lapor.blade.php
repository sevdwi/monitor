@extends('layouts.app')

@section('title', 'Home')

@section('laporan')
    <div class="ui middle aligned stackable grid container">
        <div class="row">
            <div class="column">

                <form class="ui form" method="POST" action="{{ route('lapor.store') }}" enctype="multipart/form-data">
                    @csrf
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
                            <div class="ui medium calendar" id="start_calendar">
                                <div class="ui fluid input left icon">
                                    <input type="text" name="mulai_pekerjaan" placeholder="Date/Time" autocomplete="off" required>
                                    <i class="calendar icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label>SELESAI</label>
                            <div class="ui medium calendar" id="stop_calendar">
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
                            <select class="ui fluid dropdown" name="lokasi" required>
                                <option value="">Pilih Lokasi</option>
                                @foreach($lokasis as $lokasi)
                                    <option value="{{ $lokasi->id }}">{{ $lokasi->nama }}</option>
                                @endforeach
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
                    <button class="ui primary button" type="submit">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            // Init dropdowns and calendar
            $('.ui.dropdown').dropdown();

            $('#start_calendar').calendar({
                type: 'datetime'
            });

            $('#stop_calendar').calendar({
                type: 'datetime',
                onChange: function (selesai, text) {
                    const mulai = $('#start_calendar').calendar('get date');
                    if (mulai && selesai && selesai < mulai) {
                        $('body').toast({
                            class: 'error',
                            message: 'Tanggal selesai tidak boleh sebelum tanggal mulai.',
                            showProgress: 'bottom',
                            displayTime: 5000
                        });
                        $('#stop_calendar').calendar('clear');
                    }
                }
            });

            // Toggle perangkat input enable/disable
            $('#toggle-perangkat').change(function () {
                if ($(this).is(':checked')) {
                    $('#input-perangkat').prop('disabled', false);
                    $('#radio-perangkat input').prop('disabled', false);
                    $('#radio-perangkat').css({opacity: 1, 'pointer-events': 'auto'});
                } else {
                    $('#input-perangkat').prop('disabled', true).val('');
                    $('#radio-perangkat input').prop('disabled', true).prop('checked', false);
                    $('#radio-perangkat').css({opacity: 0.5, 'pointer-events': 'none'});
                }
            });

            $('form').on('submit', function (e) {
                const mulai = $('#start_calendar').calendar('get date');
                const selesai = $('#stop_calendar').calendar('get date');

                if (selesai && mulai && selesai < mulai) {
                    e.preventDefault();
                    $('body').toast({
                        class: 'error',
                        message: 'Tanggal selesai tidak boleh sebelum tanggal mulai.',
                        showProgress: 'bottom',
                        displayTime: 5000
                    });
                }
            });
        });
    </script>
@endpush
