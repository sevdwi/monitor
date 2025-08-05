@php
    $kategoriMap = [
        'jaringan' => 'teal',
        'aplikasi' => 'blue',
        'infrastruktur' => 'orange',
    ];

    $statusIcons = [
        'belum' => ['circle notched', 'red'],
        'proses' => ['spinner', 'yellow'],
        'tertunda' => ['pause circle', 'grey'],
        'selesai' => ['check circle', 'green'],
    ];
@endphp

<style>
    #darkModeToggle {
        font-size: 1.3rem;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    /* Default icon: moon */
    #darkModeToggle.moon {
        color: black;
    }
    #darkModeToggle.moon:hover {
        color: #2185d0;
    }

    /* Dark mode icon: sun */
    #darkModeToggle.sun {
        color: #FFD700;
    }
    #darkModeToggle.sun:hover {
        color: #ffea00;
    }

    body.dark-mode {
        background-color: #1b1c1d !important;
        color: #ffffff !important;
    }

    body.dark-mode .ui.menu {
        background-color: #1b1c1d !important;
    }

    body.dark-mode .ui.card {
        background-color: #2b2c2d !important;
        color: #ffffff !important;
    }

    body.dark-mode .ui.text.container,
    body.dark-mode .ui.main.text.container {
        background-color: #1b1c1d !important; /* background gelap */
        color: #f0f0f0 !important; /* teks terang */
    }

    /* Semua teks di container supaya terang */
    body.dark-mode .ui.text.container *,
    body.dark-mode .ui.main.text.container * {
        color: #f0f0f0 !important;
    }

    body.dark-mode {
        background-color: #1b1c1d !important;
        color: #f0f0f0 !important;
    }

    /* Teks biasa jadi terang */
    body.dark-mode .ui.text.container p,
    body.dark-mode .ui.text.container .description,
    body.dark-mode .ui.text.container .content,
    body.dark-mode .ui.text.container .item,
    body.dark-mode .ui.text.container .header:not(.ui.orange.header):not(.ui.blue.header):not(.ui.teal.header) {
        color: #f0f0f0 !important;
    }

    /* Teks di dalam card tetap terang */
    body.dark-mode .ui.card .content,
    body.dark-mode .ui.card .meta,
    body.dark-mode .ui.card .description,
    body.dark-mode .ui.card .item,
    body.dark-mode .ui.card .header:not(.orange):not(.blue):not(.teal) {
        color: #f0f0f0 !important;
    }

    /* Pertahankan warna header yang berwarna */
    body.dark-mode .ui.card .ui.orange.header {
        color: #f2711c !important;
    }

    body.dark-mode .ui.card .ui.blue.header {
        color: #2185d0 !important;
    }

    body.dark-mode .ui.card .ui.teal.header {
        color: #00b5ad !important;
    }

    /* === DataTable: Dark Mode === */
    body.dark-mode table.ui.table {
        background-color: #2b2c2d !important;
        color: #f0f0f0 !important;
    }

    body.dark-mode table.ui.table thead {
        background-color: #1f1f1f !important;
        color: #f0f0f0 !important;
    }

    body.dark-mode table.ui.table tbody tr td {
        color: #f0f0f0 !important;
        border-color: #3a3a3a !important;
    }

    body.dark-mode table.ui.table tbody tr:hover {
        background-color: #333 !important;
    }

    /* Pagination, search input, etc. */
    body.dark-mode .dataTables_wrapper .dataTables_filter input,
    body.dark-mode .dataTables_wrapper .dataTables_length select {
        background-color: #2b2c2d !important;
        color: #f0f0f0 !important;
        border-color: #444 !important;
    }

    /* Pagination buttons */
    body.dark-mode .dataTables_wrapper .dataTables_paginate .paginate_button {
        color: #f0f0f0 !important;
        background-color: #1b1c1d !important;
        border: 1px solid #444 !important;
    }

    body.dark-mode .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    body.dark-mode .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background-color: #2185d0 !important;
        color: white !important;
    }

    /* Info text */
    body.dark-mode .dataTables_wrapper .dataTables_info {
        color: #ccc !important;
    }

</style>

<div class="ui borderless main menu">
    <div class="ui text container">
        <!-- Logo kiri -->
        <a href="{{ route('laporan.index') }}" class="header item">
            <i class="book icon"></i>
            MONITOR
        </a>

        <!-- Menu & Toggle kanan -->
        <div class="right menu">
            <div class="ui dropdown item">
                Menu <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" href="{{ route('dashboard') }}">Dashboard</a>
{{--                    <div class="item">Dashboard</div>--}}
                </div>
            </div>
            <div class="item">
                <i class="icon link moon" id="darkModeToggle" title="Toggle Dark Mode"></i>
            </div>
        </div>
    </div>
</div>

<div class="ui main text container" style="margin-top: 2em;">
    <h1 class="ui header">MONITOR</h1>
    <p>Semua kerjaan tercatat, gak ada yang terlewat</p>
</div>

<div class="feature alternate ui stripe vertical segment">
    <div class="ui three column center aligned stackable grid container">
        <div class="row">
            @foreach (['jaringan', 'aplikasi', 'infrastruktur'] as $kategori)
                <div class="column">
                    <div class="ui fluid card" style="box-shadow: 0 4px 10px rgba(0,0,0,0.06);">
                        <div class="content">
                            <div class="header">{{ ucfirst($kategori) }}</div>
                            <div class="meta">Pekerjaan Tertangani</div>
                            <div class="description">
                                <h2 class="ui {{ $kategoriMap[$kategori] ?? 'grey' }} header">
                                    <i class="tasks icon"></i>
                                    {{ $kategoriCounts[$kategori] ?? 0 }} total
                                </h2>

                                <div class="ui relaxed divided list" style="margin-top: 1em;">
                                    @foreach (['belum', 'proses', 'tertunda', 'selesai'] as $status)
                                        @php
                                            $count = optional($statusPerKategori[$kategori] ?? collect())
                                            ->firstWhere('status_pekerjaan', $status)
                                            ->total ?? 0;

                                            // Assign icon dan color dari $statusIcons
                                            $icon = $statusIcons[$status][0] ?? 'question circle';  // default icon kalau gak ada
                                            $color = $statusIcons[$status][1] ?? 'grey';            // default color kalau gak ada
                                        @endphp
                                        <div class="item">
                                            <i class="{{ $icon }} {{ $color }} icon"></i>
                                            <div class="content">
                                                <div class="header" style="text-transform: capitalize;">
                                                    {{ $status }}
                                                </div>
                                                <div class="description">
                                                    {{ $count }} pekerjaan
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('darkModeToggle');

        function updateIcon() {
            if(document.body.classList.contains('dark-mode')) {
                toggleBtn.classList.remove('moon');
                toggleBtn.classList.add('sun');
            } else {
                toggleBtn.classList.remove('sun');
                toggleBtn.classList.add('moon');
            }
        }

        // Cek localStorage & set mode awal
        if(localStorage.getItem('darkMode') === 'true') {
            document.body.classList.add('dark-mode');
        }
        updateIcon();

        toggleBtn.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
            updateIcon();
        });

        // Aktifkan dropdown Semantic UI
        $('.ui.dropdown').dropdown();
    });
</script>
