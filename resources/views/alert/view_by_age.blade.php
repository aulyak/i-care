@extends('adminlte::page')

@php
    // dd($arrThColumn);
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
                        <li class="breadcrumb-item"><a href="">Alert View By Age</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <form id="filter-form" action="{{ route('alert_view_by_age') }}" method="GET"
                        data-filtered-data="{{ json_encode($filteredData) }}"
                        data-bulan-alert-list="{{ json_encode($arrThColumn) }}">
                        <div class="row">
                            <div class="col-sm-6 col-md-2">
                                <!-- select -->
                                <div class="form-group">
                                    <label>WITEL</label>
                                    <select class="form-control" name="witel">
                                        <option value="">ALL</option>
                                        @foreach ($distinctWitel as $item)
                                            <option value="{{ $item }}"
                                                @if ($witel === $item) selected @endif>{{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <div class="form-group">
                                    <label>STO</label>
                                    <select class="form-control" name="sto">
                                        <option value="">ALL</option>
                                        @foreach ($distinctSto as $item)
                                            <option value="{{ $item }}"
                                                @if ($sto === $item) selected @endif>{{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <!-- select -->
                                <div class="form-group">
                                    <label>BULAN ALERT</label>
                                    <select class="form-control" name="bulanAlert">
                                        <option value="">ALL</option>
                                        @foreach ($distinctBulanAlert as $item)
                                            <option value="{{ $item }}"
                                                @if ($bulanAlert == $item) selected @endif>{{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <div class="form-group">
                                    <label>STATUS</label>
                                    <select class="form-control" name="status">
                                        <option value="">ALL</option>
                                        @foreach ($distinctStatus as $item)
                                            <option value="{{ $item }}"
                                                @if ($status === $item) selected @endif>{{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <!-- select -->
                                <div class="form-group">
                                    <label>KATEGORI HVC</label>
                                    <select class="form-control" name="kategoriHvc">
                                        <option value="">ALL</option>
                                        @foreach ($distinctKategoriHvc as $item)
                                            <option value="{{ $item }}"
                                                @if ($kategoriHvc === $item) selected @endif>{{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <div class="form-group">
                                    <label>HVC WA GROUP</label>
                                    <select class="form-control" name="hvcWaGroup">
                                        <option value="">ALL</option>
                                        @foreach ($distinctHvcWaGroup as $item)
                                            <option value="{{ $item }}"
                                                @if ($hvcWaGroup === $item) selected @endif>{{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary" style="margin: .4rem;">Go</button>
                        </div>
                        <!-- input states -->
                    </form>
                </div>
                <!-- /.card-header -->
            </div>
        </div>
    </div>
@stop

@section('content')
    @php
        // dd($array, $month, $witel);
    @endphp
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="table-view-by-age" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Alert</th>
                                        <th rowspan="2">Attribute</th>
                                        <th colspan="6">0-6 MONTHS (NEWBIE)</th>
                                        <th colspan="6">7-12 MONTHS (LEVERAGE)</th>
                                        <th colspan="6">13-18 MONTHS</th>
                                    </tr>
                                    <tr>
                                        @foreach ($arrThColumn as $item)
                                            <th>{{ $item }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('css')

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/sc-2.0.7/datatables.min.css" />
@stop

@section('js')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/sc-2.0.7/datatables.min.js">
    </script>
    <script src="js/app.js"></script>
    <script src="js/view_age.js"></script>
@stop
