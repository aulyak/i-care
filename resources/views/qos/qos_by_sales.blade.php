@extends('adminlte::page')

@php
  
@endphp

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Quality Of Sales / <a href="#">Sales by Month</a></li>
                    <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
                  </ol>
                </div><!-- /.col -->
            </div>
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
                        <label>Product</label>
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
                        <label>Ccat</label>
                        <select class="form-control">
                          <option>(ALL)</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Kwadran Inet</label>
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
                              <th rowspan="2">Bulan Sales</th>
                              <th colspan="2">0-6 Bulan</th>
                              <th>98%</th>
                              <th colspan="2">7-12 Bulan</th>
                              <th>96%</th>
                              <th colspan="2">13-18 Bulan</th>
                              <th>95%</th>
                            </tr>
                            <tr>
                              <th>0</th>
                              <th>1</th>
                              <th>6</th>
                              <th>7</th>
                              <th>8</th>
                              <th>12</th>
                              <th>13</th>
                              <th>14</th>
                              <th>18</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($result as $res)    
                              <tr>
                                <td>{{ ($res['BULAN_SALES'] ?? '-') }}</td>
                                @foreach ($agingQuery as $aq)
                                  @if ($aq < count($res['AGING_PERCENTAGE']))
                                    <td style="background-color: green;">{{ (round($res['AGING_PERCENTAGE'][$aq],2)*100 . '%' ?? '') }}</td>
                                    @else
                                    <td style="background-color: grey;"></td>
                                  @endif
                                @endforeach
                              </tr>
                              @endforeach
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
    <script src="js/qos_sales.js"></script>
@stop
