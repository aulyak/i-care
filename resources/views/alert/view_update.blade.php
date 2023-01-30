@extends('adminlte::page')

@php
@endphp

@section('content_header')
    <div class="content-header">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Alert Update</a></li>
                            <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <form>
                        <div class="row">
                            <div class="col-sm-6 col-md-2">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Witel</label>
                                    <select class="form-control">
                                        <option>(ALL)</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <div class="form-group">
                                    <label>STO</label>
                                    <select class="form-control">
                                        <option>(ALL)</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Alert</label>
                                    <select class="form-control">
                                        <option>(ALL)</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <div class="form-group">
                                    <label>Attribute</label>
                                    <select class="form-control">
                                        <option>(ALL)</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control">
                                        <option>(ALL)</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <div class="form-group">
                                    <label>Bulan Alert</label>
                                    <select class="form-control">
                                        <option>(ALL)</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="form-control btn btn-primary" style="margin: .4rem;">Ok</button>
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
                    <!-- /.card -->

                    <div class="card">
                        <!-- <div class="card-header">
                                      <h3 class="card-title">DataTable with default features</h3>
                                    </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
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
                                        <!-- <th>STATUS</th> -->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
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
                                    </tr>
                                    <tr>
                                        <td>121101201842</td>
                                        <td>JAKTIM</td>
                                        <td>JTN</td>
                                        <td>2016-02-20</td>
                                        <td>67</td>
                                        <td>VERY BAD LATENCY</td>
                                        <td>VERY HIGH ALERT</td>
                                        <td>20</td>
                                        <!-- <td>OPEN</td> -->
                                        <td><button type="button" class="form-control btn"><i class="nav-icon fas fa-edit"
                                                    data-toggle="modal" data-target="#modal-lg"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>12110120819</td>
                                        <td>JAKTIM</td>
                                        <td>JTN</td>
                                        <td>2016-01-31</td>
                                        <td>68</td>
                                        <td>VERY BAD LATENCY</td>
                                        <td>VERY HIGH ALERT</td>
                                        <td>20</td>
                                        <!-- <td>OPEN</td> -->
                                        <td><button type="button" class="form-control btn"><i class="nav-icon fas fa-edit"
                                                    data-toggle="modal" data-target="#modal-lg"></i></button></td>
                                    </tr>
                                </tbody>
                                <!-- <tfoot>
                                        <tr>
                                          <th>Rendering engine</th>
                                          <th>Browser</th>
                                          <th>Platform(s)</th>
                                          <th>Engine version</th>
                                          <th>CSS grade</th>
                                        </tr>
                                        </tfoot> -->
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

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
                                <!-- /.card-body -->
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                        <button type="button" class="btn btn-primary">UPDATE</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </section>

@stop

@section('js')
    <script src="js/app.js"></script>
    <script src="js/view_witel.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/sc-2.0.7/datatables.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/sc-2.0.7/datatables.min.js">
    </script>
@stop
