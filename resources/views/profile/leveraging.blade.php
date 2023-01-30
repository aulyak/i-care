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
                <li class="breadcrumb-item">Profile Overview / <a href="#">Leveraging</a></li>
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
                  <div class="col-sm-4 col-md-1">
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
                  <div class="col-sm-4 col-md-1">
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
                  <div class="col-sm-4 col-md-1">
                    <!-- select -->
                    <div class="form-group">
                      <label>Techno</label>
                      <select class="form-control">
                        <option>(ALL)</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4 col-md-1">
                    <div class="form-group">
                      <label>Plblcl</label>
                      <select class="form-control">
                        <option>(ALL)</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4 col-md-1">
                    <div class="form-group">
                      <label>Kat Arpu</label>
                      <select class="form-control">
                        <option>(ALL)</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4 col-md-2">
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
                  <div class="col-sm-4 col-md-2">
                    <div class="form-group">
                      <label>Range Umur</label>
                      <select class="form-control">
                        <option>(ALL)</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4 col-md-1">
                    <div class="form-group">
                      <label>Speed</label>
                      <select class="form-control">
                        <option>(ALL)</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4 col-md-2">
                    <div class="form-group">
                      <label>Jam Gangguan</label>
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
                <div class="col-sm-4 col-md-2" style="text-align: center;">
                  <div class="color-palette-set border">
                    <div class="bg-info color-palette"style="font-weight: bold;"><span>ALL DATA</span></div>
                    <div class="bg-light color-palette"><span>569,715</span></div>
                  </div>
                </div>
                <div class="col-sm-4 col-md-2" style="text-align: center;">
                  <div class="color-palette-set border">
                    <div class="color-palette" style="background-color:chocolate; color: white; font-weight: bold;"><span>1P INET</span></div>
                    <div class="bg-light color-palette"><span>408</span></div>
                  </div>
                </div>
                <div class="col-sm-4 col-md-2" style="text-align: center;">
                  <div class="color-palette-set border">
                    <div class="bg-success color-palette" style="font-weight: bold;"><span>2P (POTS-INET)</span></div>
                    <div class="bg-light color-palette"><span>251,345</span></div>
                  </div>
                </div>
                <div class="col-sm-4 col-md-2" style="text-align: center;">
                  <div class="color-palette-set border">
                    <div class="bg-primary color-palette"style="font-weight: bold;"><span>3P</span></div>
                    <div class="bg-light color-palette"><span>312,921</span></div>
                  </div>
                </div>
                <div class="col-sm-4 col-md-2" style="text-align: center;">
                  <div class="color-palette-set border">
                    <div class="bg-danger color-palette"style="font-weight: bold;"><span>HOMEWIFI</span></div>
                    <div class="bg-light color-palette"><span>3,603</span></div>
                  </div>
                </div>
                <div class="col-sm-4 col-md-2" style="text-align: center;">
                  <div class="color-palette-set border">
                    <div class="bg-danger color-palette"style="font-weight: bold;"><span>2P BRITE</span></div>
                    <div class="bg-light color-palette"><span>55</span></div>
                  </div>
                </div>
              </div>
              <div class="row" style=" margin-top: 1rem;">
                <div class="col-sm-12 col-md-7">
                  <!-- BAR CHART -->
                  <div class="card" style="height: 25rem;">
                    <div class="card-header" style="text-align: center;">
                      <h3 class="card-title">Product Type</h3>
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
                  <div class="card" style="height: 25rem;">
                    <div class="card-header" style="text-align: center;">
                      <h3 class="card-title">Proporsi Product</h3>
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
              <div class="card" style="height: 28.5rem;">
                <div class="card-header">
                  <h3 class="card-title">Product Type Per Witel</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th></th>
                      <th>1P-INTERNET (INTERNET)</th>
                      <th>2P (POTS-INTERNET)</th>
                      <th>2P-BRITE</th>
                      <th>2P-GAMER</th>
                      <th>2P-HOMEWIFI</th>
                      <th>2P-LITE</th>
                      <th>2P-NETIZEN (POTS-INTERNET)</th>
                      <th>2P-PREPAID</th>
                      <th>3P (POTS-INTERNET-IPTV)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>JAKBAR</td>
                      <td style="background-color: #c4e3d8;">113</td>
                      <td style="background-color: #c4e3d8;">656</td>
                      <td style="background-color: #c4e3d8;">8</td>
                      <td style="background-color: #c4e3d8;">327</td>
                      <td style="background-color: #c4e3d8;">75</td>
                      <td style="background-color: #c4e3d8;">1</td>
                      <td style="background-color: #8ec0c9;">46,095</td>
                      <td style="background-color: #c4e3d8;">5</td>
                      <td style="background-color: #8ec0c9;">51,137</td>
                    </tr>
                    <tr>
                      <td>JAKPUS</td>
                      <td style="background-color: #c4e3d8;">42</td>
                      <td style="background-color: #c4e3d8;">167</td>
                      <td style="background-color: #c4e3d8;">2</td>
                      <td style="background-color: #c4e3d8;">115</td>
                      <td style="background-color: #c4e3d8;">3,296</td>
                      <td style="background-color: #c4e3d8;">1</td>
                      <td style="background-color: #8ec0c9;">23,202</td>
                      <td></td>
                      <td style="background-color: #8ec0c9;">37,811</td>
                    </tr>
                    <tr>
                      <td>JAKSEL</td>
                      <td style="background-color: #c4e3d8;">88</td>
                      <td style="background-color: #c4e3d8;">589</td>
                      <td style="background-color: #c4e3d8;">10</td>
                      <td style="background-color: #c4e3d8;">228</td>
                      <td style="background-color: #c4e3d8;">59</td>
                      <td></td>
                      <td style="background-color: #8ec0c9;">55,975</td>
                      <td style="background-color: #c4e3d8;">2</td>
                      <td style="background-color: #8ec0c9;">67,614</td>
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
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-sm-12 col-md-8">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <!-- BAR CHART -->
                  <div class="card">
                    <div class="card-header" style="text-align: center;">
                      <h3 class="card-title">Usage</h3>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="horizontalBarChartCanvas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <!-- PIE CHART -->
                  <div class="card">
                    <div class="card-header" style="text-align: center;">
                      <h3 class="card-title">FUP</h3>
                    </div>
                    <div class="card-body">
                      <canvas id="fuphorizontalBarChartCanvas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <!-- BAR CHART -->
                  <div class="card">
                    <div class="card-header" style="text-align: center;">
                      <h3 class="card-title">Kategori ARPU</h3>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="kategoriArpuHorizontalBarChartCanvas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <!-- PIE CHART -->
                  <div class="card">
                    <div class="card-header" style="text-align: center;">
                      <h3 class="card-title">Jumlah Gangguan</h3>
                    </div>
                    <div class="card-body">
                      <canvas id="jumlahGangguanhorizontalBarChartCanvas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-4" style="width: 100%;">
              <div class="card" style="height: 43rem;">
                <div class="card-header">
                  <h3 class="card-title">ARPU X SPEED</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="arpuxSpeed" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th></th>
                      <th>300K-500K</th>
                      <th>500K-700K</th>
                      <th>< 300K</th>
                      <th>>= 700K</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>5</td>
                      <td style="background-color: #c4e3d8;">1</td>
                      <td></td>
                      <td style="background-color: #c4e3d8;">87</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>20</td>
                      <td style="background-color: #c4e3d8;">34</td>
                      <td style="background-color: #c4e3d8;">1</td>
                      <td style="background-color: #c4e3d8;">1,309</td>
                      <td style="background-color: #c4e3d8;">1</td>
                    </tr>
                    <tr>
                      <td>50</td>
                      <td style="background-color: #c4e3d8;">25</td>
                      <td style="background-color: #c4e3d8;">3</td>
                      <td style="background-color: #c4e3d8;">601</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>384</td>
                      <td style="background-color: #c4e3d8;">36</td>
                      <td style="background-color: #c4e3d8;">3</td>
                      <td style="background-color: #c4e3d8;">154</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>512</td>
                      <td style="background-color: #c4e3d8;">79</td>
                      <td style="background-color: #c4e3d8;">4</td>
                      <td style="background-color: #c4e3d8;">2,278</td>
                      <td style="background-color: #c4e3d8;">3</td>
                    </tr>
                    <tr>
                      <td>1024</td>
                      <td style="background-color: #c4e3d8;">1,540</td>
                      <td style="background-color: #c4e3d8;">89</td>
                      <td style="background-color: #c4e3d8;">3,935</td>
                      <td style="background-color: #c4e3d8;">123</td>
                    </tr>
                    <tr>
                      <td>2048</td>
                      <td style="background-color: #c4e3d8;">1,009</td>
                      <td style="background-color: #c4e3d8;">64</td>
                      <td style="background-color: #c4e3d8;">1,607</td>
                      <td style="background-color: #c4e3d8;">155</td>
                    </tr>
                    <tr>
                      <td>3072</td>
                      <td style="background-color: #c4e3d8;">2,204</td>
                      <td style="background-color: #c4e3d8;">144</td>
                      <td style="background-color: #c4e3d8;">1,242</td>
                      <td style="background-color: #c4e3d8;">75</td>
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
              <!-- /.card -->
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
