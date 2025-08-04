<div class="ui inverted vertical footer segment">
    <div class="ui container center aligned">
        <div class="ui stackable inverted grid">
            <div class="seven wide column">
                <h4 class="ui inverted header">Tentang</h4>
                <p>Ini digunakan untuk mengelola laporan pekerjaan terkait jaringan, aplikasi, dan infrastruktur.</p>
            </div>
            <div class="three wide column">
                <h4 class="ui inverted header">Navigasi</h4>
                <div class="ui inverted link list">
                    <a href="{{ route('laporan.index') }}" class="item">Beranda</a>
                    <a href="{{ route('lapor.create') }}" class="item">Lapor</a>
                    <a href="{{ route('opd.index') }}" class="item">Data OPD</a>
                </div>
            </div>
            <div class="three wide column">
                <h4 class="ui inverted header">Informasi</h4>
                <div class="ui inverted link list">
                    <a href="#" class="item">Kontak</a>
                    <a href="#" class="item">Kebijakan Privasi</a>
                </div>
            </div>
        </div>

        <div class="ui inverted section divider"></div>

        {{-- Optional logo, bisa ganti src sesuai logo asli --}}
        {{-- <img src="{{ asset('images/logo.png') }}" class="ui centered mini image"> --}}

        <div class="ui horizontal inverted small divided link list" style="margin-top: 1em;">
            <span class="item">© {{ date('Y') }} Bidang Informatika</span>
            <a class="item" href="#">Syarat & Ketentuan</a>
            <a class="item" href="#">Privasi</a>
        </div>
    </div>
</div>
