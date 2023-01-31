@extends('adminlte::page')

@php
@endphp

@section('content_header')
    <div class="content-header">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Alert Update</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <form id="filter-form" action="{{ route('alert_view_update') }}" method="GET"
                        data-filtered-data="{{ json_encode($filteredData) }}">
                        <div class="row">
                            <div class="col-sm-6 col-md-2">
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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="table-update" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NOTEL</th>
                                        <th>WITEL</th>
                                        <th>STO</th>
                                        <th>TGL_PS</th>
                                        <th>AGE</th>
                                        <th>ATRIBUT</th>
                                        <th>ALERT</th>
                                        <th>SCORE</th>
                                        <th>BULAN ALERT</th>
                                        <th>STATUS</th>
                                        <th>DESKRIPSI</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr>
                                        <td>11173510865</td>
                                        <td>JAKPUS</td>
                                        <td>GBI</td>
                                        <td>2015-02-02</td>
                                        <td>80</td>
                                        <td>VERY BAD LATENCY</td>
                                        <td>VERY HIGH ALERT</td>
                                        <td>20</td>
                                        <!-- <td>OPEN</td> -->
                                        <td><button type="button" class="form-control btn"><i class="nav-icon fas fa-edit"
                                                    data-toggle="modal" data-target="#modal-lg"></i></button></td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">EDIT ALERT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="notel">NOTEL</label>
                                    <input type="text" class="form-control" id="notel" placeholder="Enter notel">
                                </div>
                                <div class="form-group">
                                    <label for="witel">WITEL</label>
                                    <input type="text" class="form-control" id="witel" placeholder="Enter Witel">
                                </div>
                                <div class="form-group">
                                    <label for="sto">STO</label>
                                    <input type="text" class="form-control" id="sto" placeholder="Enter STO">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_ps">TGL PS</label>
                                    <input type="date" class="form-control" id="tgl_ps" placeholder="Enter TGL PS">
                                </div>
                                <div class="form-group">
                                    <label for="age">AGE</label>
                                    <input type="number" class="form-control" id="age" placeholder="Enter Age">
                                </div>
                                <div class="form-group">
                                    <label for="atribut">ATRIBUT</label>
                                    <input type="text" class="form-control" id="atribut"
                                        placeholder="Enter Atribut">
                                </div>
                                <div class="form-group">
                                    <label for="alert">ALERT</label>
                                    <input type="text" class="form-control" id="alert" placeholder="Enter Alert">
                                </div>
                                <div class="form-group">
                                    <label for="score">SCORE</label>
                                    <input type="number" class="form-control" id="score" placeholder="Enter Score">
                                </div>
                                <div class="form-group">
                                    <label for="bulan_alert">BULAN ALERT</label>
                                    <input type="text" class="form-control" id="bulan_alert"
                                        placeholder="Enter Bulan Alert">
                                </div>
                                <div class="form-group">
                                    <label for="status">STATUS</label>
                                    <input type="text" class="form-control" id="status" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">DESKRIPSI</label>
                                    <input type="text" class="form-control" id="deskripsi"
                                        placeholder="Enter Deskripsi">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">IMAGE UPLOAD</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-primary">UPDATE</button>
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
    <script src="js/view_update.js"></script>
@stop
