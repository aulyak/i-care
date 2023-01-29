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
                        <li class="breadcrumb-item"><a href="">Alert View By Age</a></li>
                    </ol>
                </div>
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
                          <label>WITEL</label>
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
                          <label>BULAN ALERT</label>
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
                          <label>STATUS</label>
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
                          <label>KATEGORI HVC</label>
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
                          <label>HVC WA GROUP</label>
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
                      <th rowspan="2">Alert</th>
                      <th rowspan="2">Attribute</th>
                      <th colspan="3">0-6 MONTHS (NEWBIE)</th>
                      <th colspan="3">7-12 MONTHS (LEVERAGE)</th>
                      <th>13-18 MONTHS</th>
                    </tr>
                    <tr>
                      <th>202104</th>
                      <th>202105</th>
                      <th>202106</th>
                      <th>202107</th>
                      <th>202108</th>
                      <th>202109</th>
                      <th>2021010</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>BASIC ALERT</td>
                      <td>History Retention</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td style="background-color: green;">1</td>
                      <td style="background-color: green;">1</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>BASIC ALERT</td>
                      <td>SQM</td>
                      <td style="background-color: green;">296</td>
                      <td style="background-color: green;">250</td>
                      <td style="background-color: green;">368</td>
                      <td style="background-color: green;">604</td>
                      <td style="background-color: green;">428</td>
                      <td style="background-color: green;">438</td>
                      <td style="background-color: green;">931</td>
                    </tr>
                    <tr>
                      <td>BASIC ALERT</td>
                      <td>UNSPEC</td>
                      <td style="background-color: green;">194</td>
                      <td style="background-color: green;">174</td>
                      <td style="background-color: green;">181</td>
                      <td style="background-color: green;">217</td>
                      <td style="background-color: green;">173</td>
                      <td style="background-color: green;">186</td>
                      <td style="background-color: green;">247</td>
                    </tr>
                    <tr>
                      <td>HIGH ALERT</td>
                      <td>BAD MTTR GGN</td>
                      <td style="background-color: yellow;">4,135</td>
                      <td style="background-color: yellow;">3,423</td>
                      <td style="background-color: yellow;">4,132</td>
                      <td style="background-color: yellow;">4,440</td>
                      <td style="background-color: yellow;">4,021</td>
                      <td style="background-color: yellow;">4,432</td>
                      <td style="background-color: yellow;">4,844</td>
                    </tr>
                    <tr>
                      <td>HIGH ALERT</td>
                      <td>BAD PACKET LOST</td>
                      <td style="background-color: yellow;">2,806</td>
                      <td style="background-color: yellow;">2,581</td>
                      <td style="background-color: yellow;">3,175</td>
                      <td style="background-color: yellow;">3,160</td>
                      <td style="background-color: yellow;">3,068</td>
                      <td style="background-color: yellow;">4,153</td>
                      <td style="background-color: yellow;">5,836</td>
                    </tr>
                    <tr>
                      <td>HIGH ALERT</td>
                      <td>BAD PAYMENT DATE</td>
                      <td style="background-color: yellow;">4,125</td>
                      <td style="background-color: yellow;">2,389</td>
                      <td style="background-color: yellow;">18</td>
                      <td style="background-color: yellow;">4,671</td>
                      <td style="background-color: yellow;">3,944</td>
                      <td style="background-color: yellow;">4,686</td>
                      <td style="background-color: yellow;">5,525</td>
                    </tr>
                    <tr>
                      <td>HIGH ALERT</td>
                      <td>MODOROSO > 3HR</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td style="background-color: yellow;">2</td>
                      <td></td>
                      <td></td>
                      <td style="background-color: yellow;">1</td>
                    </tr>
                    <tr>
                      <td>HIGH ALERT</td>
                      <td>TIKET NOSSA > 3HR</td>
                      <td style="background-color: yellow;">100</td>
                      <td style="background-color: yellow;">64</td>
                      <td style="background-color: yellow;">63</td>
                      <td style="background-color: yellow;">212</td>
                      <td style="background-color: yellow;">262</td>
                      <td style="background-color: yellow;">319</td>
                      <td style="background-color: yellow;">413</td>
                    </tr>
                    <tr>
                      <td>VERY HIGH ALERT</td>
                      <td>TIKET NOSSA HVC</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td style="background-color: red;">1</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>VERY HIGH ALERT</td>
                      <td>USAGE < 5GB</td>
                      <td style="background-color: red;">446</td>
                      <td style="background-color: red;">412</td>
                      <td style="background-color: red;">578</td>
                      <td style="background-color: red;">752</td>
                      <td style="background-color: red;">657</td>
                      <td style="background-color: red;">749</td>
                      <td style="background-color: red;">541</td>
                    </tr>
                    <tr>
                      <td>VERY HIGH ALERT</td>
                      <td>VERY BAD LATENCY</td>
                      <td style="background-color: red;">39</td>
                      <td style="background-color: red;">36</td>
                      <td style="background-color: red;">44</td>
                      <td style="background-color: red;">48</td>
                      <td style="background-color: red;">62</td>
                      <td style="background-color: red;">83</td>
                      <td style="background-color: red;">54</td>
                    </tr>
                    <tr>
                      <td>VERY HIGH ALERT</td>
                      <td>VERY BAD PACKET LOST</td>
                      <td style="background-color: red;">257</td>
                      <td style="background-color: red;">234</td>
                      <td style="background-color: red;">321</td>
                      <td style="background-color: red;">252</td>
                      <td style="background-color: red;">365</td>
                      <td style="background-color: red;">527</td>
                      <td style="background-color: red;">306</td>
                    </tr>
                    <tr>
                      <td>CHURN RETENTION</td>
                      <td>CAPS</td>
                      <td style="background-color: #EB455F;">72</td>
                      <td style="background-color: #EB455F;">48</td>
                      <td style="background-color: #EB455F;">44</td>
                      <td style="background-color: #EB455F;">127</td>
                      <td style="background-color: #EB455F;">154</td>
                      <td style="background-color: #EB455F;">237</td>
                      <td style="background-color: #EB455F;">246</td>
                    </tr>
                    <tr>
                      <td>LEVERAGING</td>
                      <td>OVER FUP-1</td>
                      <td style="background-color: #61876E;">67</td>
                      <td style="background-color: #61876E;">55</td>
                      <td style="background-color: #61876E;">94</td>
                      <td style="background-color: #61876E;">691</td>
                      <td style="background-color: #61876E;">847</td>
                      <td style="background-color: #61876E;">828</td>
                      <td style="background-color: #61876E;">849</td>
                    </tr>
                    <tr>
                      <td>LEVERAGING</td>
                      <td>OVER FUP-2</td>
                      <td style="background-color: #61876E;">17</td>
                      <td style="background-color: #61876E;">17</td>
                      <td style="background-color: #61876E;">32</td>
                      <td style="background-color: #61876E;">206</td>
                      <td style="background-color: #61876E;">266</td>
                      <td style="background-color: #61876E;">252</td>
                      <td style="background-color: #61876E;">315</td>
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
      </section>

@stop

@section('js')
    <script src="js/app.js"></script>
    <script src="js/view_age.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/sc-2.0.7/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/sc-2.0.7/datatables.min.js"></script>
@stop
