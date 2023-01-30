@extends('adminlte::page')

@php
@endphp

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 date"></h1>
                    <h1 class="m-0 time"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard') }}" method="GET">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>WITEL</label>
                                    <select name="witel" class="form-control">
                                        <option value="">All</option>
                                        @foreach ($distinctWitel as $item)
                                            <option value="{{ $item }}"
                                                @if ($witel === $item) selected @endif>{{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>BULAN</label>
                                    <select name="month" class="form-control">
                                        <option value="">All</option>
                                        @foreach ($monthList as $item)
                                            <option value="{{ $item }}"
                                                @if ($month === $item) selected @endif>{{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>TAHUN</label>
                                    <select name="year" class="form-control">
                                        <option value="">All</option>
                                        @foreach ($yearList as $item)
                                            <option value="{{ $item }}"
                                                @if ($year == $item) selected @endif>{{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" style="width: 100%;" type="button" class="btn btn-primary">Go</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    @php
        // dd($array, $month, $witel);
    @endphp
    {{-- @if ($month && $witel) --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ number_format($totalSales) }}</h3>

                            <p>TOTAL SALES</p>
                            <label style="font-style:italic;">(Mtd H-1)</label>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box" style="background-color: #fd7e14;">
                        <div class="inner">
                            <h3>{{ $totalSales != 0 ? number_format(($totalLoss / $totalSales) * 100, 2) . ' %' : 'N/A' }}
                            </h3>

                            <p>LOSS TO SALES</p>
                            <label style="font-style:italic;">(Mtd H-1)</label>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box" style="background-color: #fd7e14;">
                        <div class="inner">
                            <h3>{{ $totalLis != 0 ? number_format(($totalLoss / $totalLis) * 100, 2) . ' %' : 'N/A' }}</h3>

                            <p>LOST TO LIS</p>
                            <label style="font-style:italic;">(Mtd H-1)</label>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ is_null($totalLis) ? 0 : number_format($totalLis) }}</h3>

                            <p>TOTAL LIS</p>
                            <label style="font-style:italic;">(Mtd H-1)</label>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ is_null($totalVha) ? 0 : number_format($totalVha) }}
                            </h3>

                            <p>VH ALERT</p>
                            <label style="font-style:italic;">(Mtd H-1)</label>
                        </div>
                        <div class="icon">
                            <i class="ion ion-clipboard"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ is_null($totalLoss) ? 0 : number_format($totalLoss) }}</h3>

                            <p>TOTAL LOST</p>
                            <label style="font-style:italic;">(Mtd H-1)</label>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" style="text-align: center; margin: auto;">
                            <h3 class="card-title">Summary LIS, Sales & Churn</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="summary" data-filtered-alert="{{ json_encode($filteredAlert) }}"
                                    data-filtered-summary="{{ json_encode($filteredSummary) }}"
                                    data-filtered-profile-loss="{{ json_encode($filteredProfileLoss) }}"
                                    data-total="{{ json_encode([
                                        'totalLis' => $totalLis,
                                        'totalLoss' => $totalLoss,
                                        'totalVha' => $totalVha,
                                        'totalSales' => $totalSales,
                                    ]) }}"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" style="text-align: center; margin: auto;">
                            <h3 class="card-title">Proporsi LIS</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="proporsi"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">TREN LOSS TO SALES</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="tren"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- @endif --}}

@stop

@section('js')
    <script src="js/app.js"></script>
    <script src="js/dashboard.js"></script>
@stop
