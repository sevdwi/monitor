@extends('layouts.app')

@section('title', 'Statistic')

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


@section('stat')
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
                                                [$icon, $color] = $statusIcons[$status];
                                                $count = optional($statusPerKategori[$kategori])
                                                    ->firstWhere('status_pekerjaan', $status)
                                                    ->total ?? 0;
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
@endsection
