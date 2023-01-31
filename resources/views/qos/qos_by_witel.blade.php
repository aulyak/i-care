@extends('adminlte::page')

@php
    // dd($arrThColumn);
@endphp

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Quality Of Sales / <a href="#">Sales by Witel</a></li>
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
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label>Bulan Sales</label>
                        <select class="form-control">
                          <option>(ALL)</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
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
                    <div class="col-sm-6 col-md-3">
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
                    <div class="col-sm-6 col-md-3">
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
                            <th rowspan="2">Witel</th>
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
                          <tr>
                            <td>BANTEN</td>
                            <td style="background-color: green;">100.00%</td>
                            <td style="background-color: green;">99.77%</td>
                            <td style="background-color: green;">88.1%</td>
                            <td style="background-color: green;">85.90%</td>
                            <td style="background-color: green;">83.76%</td>
                            <td style="background-color: yellow;">77.07%</td>
                            <td style="background-color: yellow;">76.08%</td>
                            <td style="background-color: yellow;">75.11%</td>
                            <td style="background-color: yellow;">70.51%</td>
                          </tr>
                          <tr>
                            <td>BEKASI</td>
                            <td style="background-color: green;">99.99%</td>
                            <td style="background-color: green;">99.11%</td>
                            <td style="background-color: green;">87.71%</td>
                            <td style="background-color: green;">85.54%</td>
                            <td style="background-color: green;">83.44%</td>
                            <td style="background-color: yellow;">76.41%</td>
                            <td style="background-color: yellow;">75.20%</td>
                            <td style="background-color: yellow;">74.27%</td>
                            <td style="background-color: orangered;">68.78%</td>
                          </tr>
                          <tr>
                            <td>BOGOR</td>
                            <td style="background-color: green;">99.98%</td>
                            <td style="background-color: green;">99.19%</td>
                            <td style="background-color: green;">89.50%</td>
                            <td style="background-color: green;">87.78%</td>
                            <td style="background-color: green;">86.06%</td>
                            <td style="background-color: yellow;">80.00%</td>
                            <td style="background-color: yellow;">79.12%</td>
                            <td style="background-color: yellow;">78.70%</td>
                            <td style="background-color: yellow;">71.9%</td>
                          </tr>
                          </tbody>
                          <tfoot>
                            <tr style="font-weight: bold;">
                              <td>GRAND TOTAL</td>
                              <td style="background-color: green;">99.99%</td>
                              <td style="background-color: green;">98.40%</td>
                              <td style="background-color: green;">85.81%</td>
                              <td style="background-color: green;">83.64%</td>
                              <td style="background-color: green;">81.34%</td>
                              <td style="background-color: yellow;">75.47%</td>
                              <td style="background-color: yellow;">74.06%</td>
                              <td style="background-color: yellow;">72.81%</td>
                              <td style="background-color: yellow;">64.46%</td>
                            </tr>
                          </tfoot>
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
