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
                <li class="breadcrumb-item">Profile Overview / <a href="#">Retention</a></li>
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
                  <div class="col-sm-3 col-md-2">
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
                  <div class="col-sm-3 col-md-2">
                    <!-- select -->
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
                  <div class="col-sm-3 col-md-2">
                    <!-- select -->
                    <div class="form-group">
                      <label>Segment</label>
                      <select class="form-control">
                        <option>(ALL)</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4 col-md-3">
                    <div class="form-group">
                      <label>Periode</label>
                      <select class="form-control">
                        <option>(ALL)</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4 col-md-3">
                    <div class="form-group">
                      <label>Ket CT02</label>
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
            <div class="col-sm-12 col-md-8">
              <div class="row" style="font-size: 80%;">
                <div class="col-sm-3 col-md-2" style="text-align: center;">
                  <div class="color-palette-set border">
                    <div class="color-palette" style="font-weight: bold; background-color: #7e80f7; color: white;"><span>TOTAL CTO</span></div>
                    <div class="bg-light color-palette"><span>232,044</span></div>
                  </div>
                </div>
                <div class="col-sm-3 col-md-1" style="text-align: center;">
                  <div class="color-palette-set border">
                    <div class="color-palette" style="background-color:#f2ae86; color: white; font-weight: bold;"><span>CAPS</span></div>
                    <div class="bg-light color-palette"><span>10,315</span></div>
                  </div>
                </div>
                <div class="col-sm-3 col-md-1" style="text-align: center;">
                  <div class="color-palette-set border">
                    <div class="color-palette" style="background-color:#f2ae86; color: white; font-weight: bold;"><span>CTO</span></div>
                    <div class="bg-light color-palette"><span>99,850</span></div>
                  </div>
                </div>
                <div class="col-sm-3 col-md-2" style="text-align: center;">
                  <div class="color-palette-set border">
                    <div class="color-palette" style="background-color:#f2ae86; color: white; font-weight: bold;"><span>CTO NDE</span></div>
                    <div class="bg-light color-palette"><span>5,878</span></div>
                  </div>
                </div>
                <div class="col-sm-3 col-md-1" style="text-align: center;">
                  <div class="color-palette-set border">
                    <div class="color-palette" style="background-color:#f2ae86; color: white; font-weight: bold;"><span>ABNOL</span></div>
                    <div class="bg-light color-palette"><span>8,058</span></div>
                  </div>
                </div>
                <div class="col-sm-3 col-md-2" style="text-align: center; ">
                  <div class="color-palette-set border">
                    <div class="color-palette" style="background-color:#f2ae86; color: white; font-weight: bold;"><span>DUNNING</span></div>
                    <div class="bg-light color-palette"><span>7,877</span></div>
                  </div>
                </div>
                <div class="col-sm-3 col-md-2" style="text-align: center;">
                  <div class="color-palette-set border">
                    <div class="color-palette" style="background-color:#f2ae86; color: white; font-weight: bold;"><span>HOMEWIFI</span></div>
                    <div class="bg-light color-palette"><span>9,3485</span></div>
                  </div>
                </div>
                <div class="col-sm-3 col-md-1" style="text-align: center;">
                  <div class="color-palette-set border">
                    <div class="color-palette" style="background-color:#f2ae86; color: white; font-weight: bold;"><span>CABUT</span></div>
                    <div class="bg-light color-palette"><span>6,579</span></div>
                  </div>
                </div>
              </div>
              <div class="row" style=" margin-top: 1rem;">
                <div class="col-sm-12 col-md-7">
                  <!-- BAR CHART -->
                  <div class="card">
                    <div class="card-header" style="text-align: center;">
                      <h3 class="card-title">Keterangan CTO</h3>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
                <div class="col-sm-12 col-md-5">
                  <!-- PIE CHART -->
                  <div class="card">
                    <div class="card-header" style="text-align: center;">
                      <h3 class="card-title">Proporsi CTO</h3>
                    </div>
                    <div class="card-body">
                      <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-4" style="width: 100%;">
              <div class="card" style="height: 24.5rem;">
                <div class="card-header" style="text-align: center;">
                  <h3 class="card-title">CTO PER WITEL</h3>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="ctoPerWitelBarChartCanvas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <div class="row">
                <div class="col-sm-12 col-md-4">
                  <div class="card" style="height: 29.70rem;">
                    <div class="card-header">
                      <h3 class="card-title">CTO PER UMUR CTO</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="padding-top:20%">
                      <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th></th>
                          <th>NEW CTO</th>
                          <th>1-3 BULAN</th>
                          <th>4-6 BULAN</th>
                          <th>7-12 BULAN</th>
                          <th>13-14 BULAN</th>
                          <th>> 24 BULAN</th>
                          <th>GRAND TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>BANTEN</td>
                          <td style="background-color: #e88771;">1,556</td>
                          <td style="background-color: #e88771;">2,465</td>
                          <td style="background-color: #e88771;">3,577</td>
                          <td style="background-color: #83b870;">868</td>
                          <td style="background-color: #83b870;">578</td>
                          <td style="background-color: #83b870;">176</td>
                          <td style="background-color: #d24c49;">9,220</td>
                        </tr>
                        <tr>
                          <td>BEKASI</td>
                          <td style="background-color: #e88771;">2,927</td>
                          <td style="background-color: #e88771;">4,184</td>
                          <td style="background-color: #e88771;">6,356</td>
                          <td style="background-color: #e88771;">1,225</td>
                          <td style="background-color: #e88771;">1,086</td>
                          <td style="background-color: #83b870;">385</td>
                          <td style="background-color: #9f263c;">16,163</td>
                        </tr>
                        <tr>
                          <td>BOGOR</td>
                          <td style="background-color: #e88771;">4,129</td>
                          <td style="background-color: #e88771;">3,784</td>
                          <td style="background-color: #e88771;">5,248</td>
                          <td style="background-color: #e88771;">1,460</td>
                          <td style="background-color: #e88771;">1,738</td>
                          <td style="background-color: #83b870;">728</td>
                          <td style="background-color: #9f263c;">17,087</td>
                        </tr>
                        </tbody>
                        <!-- <tfoot>
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
                        </tfoot> -->
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
                <div class="col-sm-12 col-md-4">
                  <!-- PIE CHART -->
                  <div class="card" style="height: 29.70rem;">
                    <div class="card-header" style="text-align: center;">
                      <h3 class="card-title">CTO PER SEGMENT</h3>
                    </div>
                    <div class="card-body" style="padding-top:20%">
                      <canvas id="ctoPieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <div class="col-sm-12 col-md-4" style="width: 100%;">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">DETAIL PER WITEL</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="arpuxSpeed" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>WITEL</th>
                          <th>ABON NOL</th>
                          <th>BACKDATE</th>
                          <th>CABUT</th>
                          <th>CAPS</th>
                          <th>CTO</th>
                          <th>CTO NDE</th>
                          <th>DUNNING</th>
                          <th>HOMEWIFI</th>
                          <th>GRAND TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>BANTEN</td>
                          <td style="background-color: #83b870;">379</td>
                          <td></td>
                          <td style="background-color: #83b870;">285</td>
                          <td style="background-color: #83b870;">691</td>
                          <td style="background-color: #d14c49;">7,865</td>
                          <td></td>
                          <td style="background-color: #83b870;">89</td>
                          <td style="background-color: #e88771;">1,900</td>
                          <td style="background-color: #d14c49;">11,209</td>
                        </tr>
                        <tr>
                          <td>BEKASI</td>
                          <td style="background-color: #83b870;">789</td>
                          <td></td>
                          <td style="background-color: #83b870;">744</td>
                          <td style="background-color: #e88771;">1,308</td>
                          <td style="background-color: #d14c49;">13,322</td>
                          <td></td>
                          <td style="background-color: #e88771;">1,739</td>
                          <td style="background-color: #d14c49;">13,138</td>
                          <td style="background-color: #d14c49;">31,040</td>
                        </tr>
                        <tr>
                          <td>BOGOR</td>
                          <td style="background-color: #83b870;">805</td>
                          <td></td>
                          <td style="background-color: #e88771;">1,479</td>
                          <td style="background-color: #e88771;">1,521</td>
                          <td style="background-color: #d14c49;">13,271</td>
                          <td style="background-color: #83b870;">11</td>
                          <td style="background-color: #83b870;">700</td>
                          <td style="background-color: #e88771;">7,675</td>
                          <td style="background-color: #d14c49;">25,462</td>
                        </tr>
                        </tbody>
                        <tfoot>
                          <tr style="font-weight: bold;">
                            <td>GRAND TOTAL</td>
                            <td style="background-color: #83b870;">805</td>
                            <td></td>
                            <td style="background-color: #e88771;">1,479</td>
                            <td style="background-color: #e88771;">1,521</td>
                            <td style="background-color: #d14c49;">13,271</td>
                            <td style="background-color: #83b870;">11</td>
                            <td style="background-color: #83b870;">700</td>
                            <td style="background-color: #e88771;">7,675</td>
                            <td style="background-color: #d14c49;">25,462</td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>
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
    <script src="js/leveraging.js"></script>
@stop
