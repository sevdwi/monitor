<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My App')</title>
    <!-- Import font Inter dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    @stack('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- DataTables core -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Semantic UI theme -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.semanticui.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.semanticui.min.js"></script>

    <!-- Calendar Component Fomantic UI theme -->
    <!-- CSS: hanya komponen calendar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.4/components/calendar.min.css"/>

    <!-- JS: hanya komponen calendar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.4/components/calendar.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.9.3/dist/components/toast.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.9.3/dist/components/toast.min.js"></script>


    <script>
        $(document)
            .ready(function() {

                // show dropdown on hover
                $('.main.menu  .ui.dropdown').dropdown({
                    on: 'hover'
                });

                //enable dropdown on select
                $('select.dropdown')
                    .dropdown();

                //show star rating
                $('.ui.rating').rating();

                //enable sticky effect
                $('.ui.sticky').sticky();

                $('.ui.checkbox')
                    .checkbox();

                $('.ui.radio.checkbox')
                    .checkbox();

                // fix main menu to page on passing
                $('.main.menu').visibility({
                    type: 'fixed'
                });
                $('.overlay').visibility({
                    type: 'fixed',
                    offset: 80
                });

                // lazy load images
                $('.image').visibility({
                    type: 'image',
                    transition: 'vertical flip in',
                    duration: 500
                });


                $('#toggle-perangkat').change(function () {
                    const isChecked = $(this).is(':checked');

                    // Reset input perangkat
                    $('#input-perangkat').prop('disabled', !isChecked).val('');

                    // Reset radio button jika toggle dimatikan
                    if (!isChecked) {
                        $('#radio-perangkat input[type="radio"]')
                            .prop('checked', false) // hapus pilihan
                            .prop('disabled', true); // pastikan disabled juga
                    }

                    updateRadioStatus();
                });

                $('#input-perangkat').on('input', function () {
                    updateRadioStatus();
                });

                function updateRadioStatus() {
                    const inputVal = $('#input-perangkat').val().trim();
                    const shouldEnable = inputVal !== '';

                    $('#radio-perangkat').css({
                        opacity: shouldEnable ? 1 : 0.5,
                        'pointer-events': shouldEnable ? 'auto' : 'none'
                    });

                    $('#radio-perangkat input[type="radio"]').prop('disabled', !shouldEnable);
                }
            })
        ;
    </script>

    <script>
        $(document).ready(function() {
            $('#laporan').DataTable({
                "pagingType": "full_numbers",
                "language": {
                    "emptyTable": "Belum ada data laporan.",
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ entri",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    "infoEmpty": "Tidak ada data",
                    "infoFiltered": "(difilter dari _MAX_ total entri)",
                },
                initComplete: function () {
                    $('#laporan_filter').append(`
                        <button id="openLaporanModal" class="ui blue button" style="margin-left: 1em;">
                            <i class="plus icon"></i> Tambah Laporan
                        </button>
                    `);

                    $('#openLaporanModal').on('click', function() {
                        // Contoh aksi: tampilkan modal
                        $('.ui.modal').modal('show');
                        // Atau jalankan fungsi lain sesuai kebutuhanmu
                    });
                }

            });
        });
    </script>

    @stack('style')


    <style>
        body {
            background-color: #FFFFFF;
        }
        .main.container {
            margin-top: 2em;
        }

        .main.menu {
            margin-top: 4em;
            border-radius: 0;
            border: none;
            box-shadow: none;
            transition:
                box-shadow 0.5s ease,
                padding 0.5s ease
        ;
        }
        .main.menu .item img.logo {
            margin-right: 1.5em;
        }

        .overlay {
            float: left;
            margin: 0em 3em 1em 0em;
        }
        .overlay .menu {
            position: relative;
            left: 0;
            transition: left 0.5s ease;
        }

        .main.menu.fixed {
            background-color: #FFFFFF;
            border: 1px solid #DDD;
            box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2);
        }
        .overlay.fixed .menu {
            left: 800px;
        }

        .text.container .left.floated.image {
            margin: 2em 2em 2em -4em;
        }
        .text.container .right.floated.image {
            margin: 2em -4em 2em 2em;
        }

        .ui.footer.segment {
            margin: 5em 0em 0em;
            padding: 5em 0em;
        }

        /* override font */
        body,
        .ui,
        .ui *:not(i):not(.icon):not(.icons) {
            font-family: 'Inter', 'Helvetica Neue', Arial, sans-serif !important;
        }

        .ui.modal,
        .ui.modal .header,
        .ui.modal .content,
        .ui.modal .actions,
        .ui.modal *:not(i):not(.icon):not(.icons) {
            font-family: 'Inter', 'Helvetica Neue', Arial, sans-serif !important;
        }

        input,
        input[type="file"],
        input[type="url"],
        textarea,
        select {
            font-family: 'Inter', 'Helvetica Neue', Arial, sans-serif !important;
        }

        input::placeholder,
        textarea::placeholder {
            font-family: 'Inter', 'Helvetica Neue', Arial, sans-serif !important;
            opacity: 1;
        }

         .flex-row {
             display: flex;
             align-items: center;
             gap: 0.5rem; /* jarak antar elemen */
         }

        .flex-row select.ui.dropdown {
            flex: 1; /* biar select-nya lebar penuh, sisanya buat tombol */
        }
    </style>

</head>
<body class="{{ session('darkMode') ? 'dark-mode' : '' }}">
{{-- Navbar --}}
@include('partials.navbar')


{{--<div class="ui grid" style="margin-top:2em;">--}}
    {{-- Sidebar --}}
{{--    <div class="four wide column">--}}
{{--        @include('partials.sidebar')--}}
{{--    </div>--}}

<div class="ui grid" style="margin-top:2em;">
    <div class="sixteen wide column">
        @yield('tabel')
        @yield('laporan')
        @yield('opd')
    </div>

    <div class="twelve wide column centered">
        @yield('dashboard')
    </div>
</div>


{{-- Footer --}}
@include('partials.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js"></script>
@stack('scripts')

</body>
</html>
