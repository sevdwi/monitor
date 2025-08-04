@extends('layouts.app')

@section('title', 'OPD')

@section('opd')
    <div class="ui container">
        <h2 class="ui dividing header">Form Tambah Lokasi</h2>

        <form class="ui form" id="form-lokasi" method="POST" action="{{ route('lokasi.store') }}">
            @csrf

            <div class="field">
                <label>OPD</label>
                <div class="flex-row">
                    <select name="opd_id" class="ui fluid search dropdown" required>
                        <option value="">-- Pilih OPD --</option>
                        @foreach($opds as $opd)
                            <option value="{{ $opd->id }}">{{ $opd->nama }} ({{ $opd->kode }})</option>
                        @endforeach
                    </select>
                    <button type="button" class="ui icon button" onclick="$('#modal-tambah-opd').modal('show')">
                        <i class="plus icon"></i>
                    </button>
                </div>
            </div>

            <div class="field">
                <label>Nama Lokasi</label>
                <input type="text" name="nama" placeholder="Contoh: Kantor Kecamatan X" required>
            </div>

            <div class="field">
                <label>Alamat</label>
                <input type="text" name="alamat" placeholder="Jl. Contoh No. 123" required>
            </div>

            <div class="field">
                <label>Koordinat</label>
                <input type="text" name="koordinat" placeholder="-7.250445, 112.768845">
            </div>

            <button class="ui primary button" type="submit">Simpan</button>
        </form>


        <div class="ui modal" id="modal-tambah-opd">
            <i class="close icon"></i>
            <div class="header">Tambah OPD</div>
            <div class="content">
                <form class="ui form" id="form-opd" method="POST" action="{{ route('opd.store') }}">
                    @csrf
                    <div class="field">
                        <label>Nama OPD</label>
                        <input type="text" name="nama" required>
                    </div>
                    <div class="field">
                        <label>Kode OPD</label>
                        <input type="text" name="kode" required>
                    </div>
                    <button class="ui blue button" type="submit">Simpan</button>
                </form>
            </div>
        </div>


    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#form-opd').off('submit').on('submit', function (e) {
                e.preventDefault();

                const form = $(this);
                const url = form.attr('action');
                const data = form.serialize();

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: data,
                    success: function (response) {
                        $('#modal-tambah-opd').modal('hide');
                        form[0].reset();

                        const newOption = `<option value="${response.id}" selected>${response.nama} (${response.kode})</option>`;
                        $('select[name="opd_id"]').append(newOption).val(response.id).trigger('change');

                        $('body').toast({
                            class: 'success',
                            message: 'OPD berhasil ditambahkan!',
                            showProgress: 'bottom',
                            displayTime: 3000
                        });
                    },
                    error: function (xhr) {
                        const errors = xhr.responseJSON?.errors;
                        if (errors) {
                            Object.values(errors).forEach(function (msg) {
                                $('body').toast({
                                    class: 'error',
                                    message: msg[0],
                                    showProgress: 'bottom',
                                    displayTime: 4000
                                });
                            });
                        } else {
                            $('body').toast({
                                class: 'error',
                                message: 'Terjadi kesalahan saat menyimpan data.',
                                showProgress: 'bottom'
                            });
                        }
                    }
                });
            });
        });

    </script>

    <script>
        $(document).ready(function () {
            $('#form-lokasi').submit(function (e) {
                e.preventDefault();

                const form = $(this);
                const url = form.attr('action');
                const data = form.serialize();

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: data,
                    success: function (res) {
                        // Reset form
                        form[0].reset();
                        // Reset dropdown ke default
                        $('select[name="opd_id"]').val('').dropdown('clear');

                        // Tampilkan toast sukses
                        $('body').toast({
                            class: 'success',
                            message: 'Lokasi berhasil ditambahkan!',
                            showProgress: 'bottom',
                            displayTime: 3000
                        });

                        // Opsional: kalau mau reload tabel atau data di tempat lain, bisa taruh di sini
                        // refreshLokasiList();
                    },
                    error: function (xhr) {
                        const errors = xhr.responseJSON?.errors;
                        if (errors) {
                            Object.values(errors).forEach(function (msg) {
                                $('body').toast({
                                    class: 'error',
                                    message: msg[0],
                                    showProgress: 'bottom',
                                    displayTime: 4000
                                });
                            });
                        } else {
                            $('body').toast({
                                class: 'error',
                                message: 'Terjadi kesalahan saat menyimpan data.',
                                showProgress: 'bottom'
                            });
                        }
                    }
                });
            });
        });
    </script>
@endpush




