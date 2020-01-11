<?php /** @var \App\Models\Spectrum $spectrum*/?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body pb-1">
                        <h4 class="card-title">{{ $spectrum->title }}</h4>
                        <p class="card-text">
                            <b>Category:</b> {{ $spectrum->category->title }}<br>
                            <hr>
                            <b>State:</b> {{ $spectrum->state }}<br>
                            <b>Env. temp:</b> {{ $spectrum->temp }} K.<br>
                            <hr>
                            <b>System:</b> {{ $spectrum->system }}<br>
                            <b>Mode:</b> {{ $spectrum->mode }}<br>
                            <b>Range:</b> {{ $spectrum->min_freq }}...{{ $spectrum->max_freq }} THz
                        </p>
                    </div>
                    <div class="card-footer py-1 text-muted">
                        by {{ $spectrum->user->first_name }} {{ $spectrum->user->second_name }}
                    </div>
                </div>
            </div>
            <div class="col-9">
                <canvas id="spectrumChart" width="825" height="700"></canvas>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        window.onload = () => {
            let ctx = document.getElementById('spectrumChart');
            let scatterChart = new Chart(ctx, {
                type: 'line',
                data: {
                    datasets: [{
                        data: {!! $spectrum->points !!},
                        fill: false,
                    }]
                },
                options: {
                    responsive: false,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Frequency, Thz',
                                fontSize: 14
                            },
                            type: 'linear',
                            position: 'bottom'
                        }],
                        yAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Amplitude, a.u.',
                                fontSize: 14
                            },
                            type: 'logarithmic',
                        }]
                    }
                }
            });
        }
    </script>
@endpush
