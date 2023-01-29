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
                        <li class="breadcrumb-item"><a href="">Alert View By Witel</a></li>
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
                        <th>Alert</th>
                        <th>Attribute</th>
                        <th>BANTEN</th>
                        <th>BEKASI</th>
                        <th>BOGOR</th>
                        <th>JAKBAR</th>
                        <th>JAKPUS</th>
                        <th>JAKSEL</th>
                        <th>JAKTIM</th>
                        <!-- <th>JAKUT</th>
                        <th>TANGERANG</th> -->
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>BASIC ALERT</td>
                        <td>History Retention</td>
                        <td></td>
                        <td style="background-color: green;">4</td>
                        <td style="background-color: green;">12</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <!-- <td></td>
                        <td style="background-color: green;">3</td> -->
                      </tr>
                    <tr>
                      <td>BASIC ALERT</td>
                      <td>SQM</td>
                      <td style="background-color: green;">2,016</td>
                      <td style="background-color: green;">7,394</td>
                      <td style="background-color: green;">5,350</td>
                      <td style="background-color: green;">2,084</td>
                      <td style="background-color: green;">2,607</td>
                      <td style="background-color: green;">2,532</td>
                      <td style="background-color: green;">6,720</td>
                      <!-- <td></td>
                      <td></td> -->
                    </tr>
                    <tr>
                      <td>BASIC ALERT</td>
                      <td>UNSPEC</td>
                      <td style="background-color: green;">354</td>
                      <td style="background-color: green;">314</td>
                      <td style="background-color: green;">4,747</td>
                      <td style="background-color: green;">760</td>
                      <td style="background-color: green;">323</td>
                      <td style="background-color: green;">730</td>
                      <td style="background-color: green;">649</td>
                      <!-- <td></td>
                      <td></td> -->
                    </tr>
                    <tr>
                      <td>HIGH ALERT</td>
                      <td>BAD MTTR GGN</td>
                      <td style="background-color: yellow;">10,014</td>
                      <td style="background-color: yellow;">23,146</td>
                      <td style="background-color: yellow;">29,454</td>
                      <td style="background-color: yellow;">18,822</td>
                      <td style="background-color: yellow;">11,081</td>
                      <td style="background-color: yellow;">20,237</td>
                      <td style="background-color: yellow;">28,807</td>
                      <!-- <td></td>
                      <td></td> -->
                    </tr>
                    <tr>
                      <td>HIGH ALERT</td>
                      <td>BAD PACKET LOST</td>
                      <td style="background-color: yellow;">14,397</td>
                      <td style="background-color: yellow;">19,960</td>
                      <td style="background-color: yellow;">29,449</td>
                      <td style="background-color: yellow;">15,450</td>
                      <td style="background-color: yellow;">11,082</td>
                      <td style="background-color: yellow;">20,150</td>
                      <td style="background-color: yellow;">20,849</td>
                      <!-- <td></td>
                      <td></td> -->
                    </tr>
                    <tr>
                      <td>HIGH ALERT</td>
                      <td>BAD PAYMENT DATE</td>
                      <td style="background-color: yellow;">12,020</td>
                      <td style="background-color: yellow;">19,371</td>
                      <td style="background-color: yellow;">19,511</td>
                      <td style="background-color: yellow;">10,502</td>
                      <td style="background-color: yellow;">8,171</td>
                      <td style="background-color: yellow;">17,132</td>
                      <td style="background-color: yellow;">18,583</td>
                      <!-- <td></td>
                      <td></td> -->
                    </tr>
                    <tr>
                      <td>HIGH ALERT</td>
                      <td>MODOROSO > 3HR</td>
                      <td style="background-color: yellow;">350</td>
                      <td style="background-color: yellow;">622</td>
                      <td style="background-color: yellow;">1,286</td>
                      <td style="background-color: yellow;">305</td>
                      <td style="background-color: yellow;">246</td>
                      <td style="background-color: yellow;">837</td>
                      <td style="background-color: yellow;">669</td>
                      <!-- <td></td>
                      <td></td> -->
                    </tr>
                    <tr>
                      <td>HIGH ALERT</td>
                      <td>TIKET NOSSA > 3HR</td>
                      <td style="background-color: yellow;">786</td>
                      <td style="background-color: yellow;">2,112</td>
                      <td style="background-color: yellow;">2,648</td>
                      <td style="background-color: yellow;">1,004</td>
                      <td style="background-color: yellow;">429</td>
                      <td style="background-color: yellow;">1,018</td>
                      <td style="background-color: yellow;">2,345</td>
                      <!-- <td></td>
                      <td></td> -->
                    </tr>
                    <tr>
                      <td>VERY HIGH ALERT</td>
                      <td>TIKET NOSSA HVC</td>
                      <td style="background-color: red;">29</td>
                      <td style="background-color: red;">117</td>
                      <td style="background-color: red;">133</td>
                      <td style="background-color: red;">75</td>
                      <td style="background-color: red;">32</td>
                      <td style="background-color: red;">72</td>
                      <td style="background-color: red;">128</td>
                      <!-- <td></td>
                      <td></td> -->
                    </tr>
                    <tr>
                      <td>VERY HIGH ALERT</td>
                      <td>USAGE < 5GB</td>
                      <td style="background-color: red;">1,466</td>
                      <td style="background-color: red;">4,058</td>
                      <td style="background-color: red;">4,583</td>
                      <td style="background-color: red;">4,264</td>
                      <td style="background-color: red;">5,769</td>
                      <td style="background-color: red;">5,350</td>
                      <td style="background-color: red;">4,759</td>
                      <!-- <td></td>
                      <td></td> -->
                    </tr>
                    <tr>
                      <td>VERY HIGH ALERT</td>
                      <td>VERY BAD LATENCY</td>
                      <td style="background-color: red;">236</td>
                      <td style="background-color: red;">183</td>
                      <td style="background-color: red;">363</td>
                      <td style="background-color: red;">173</td>
                      <td style="background-color: red;">315</td>
                      <td style="background-color: red;">172</td>
                      <td style="background-color: red;">205</td>
                      <!-- <td></td>
                      <td></td> -->
                    </tr>
                    <tr>
                      <td>VERY HIGH ALERT</td>
                      <td>VERY BAD PACKET LOST</td>
                      <td style="background-color: red;">613</td>
                      <td style="background-color: red;">1,925</td>
                      <td style="background-color: red;">3,228</td>
                      <td style="background-color: red;">1,625</td>
                      <td style="background-color: red;">1,240</td>
                      <td style="background-color: red;">1,836</td>
                      <td style="background-color: red;">1,890</td>
                      <!-- <td></td>
                      <td></td> -->
                    </tr>
                    <tr>
                      <td>CHURN RETENTION</td>
                      <td>CAPS</td>
                      <td></td>
                      <td style="background-color: #EB455F;">1,229</td>
                      <td style="background-color: #EB455F;">4,648</td>
                      <td style="background-color: #EB455F;">1</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <!-- <td></td>
                      <td></td> -->
                    </tr>
                    <tr>
                      <td>LEVERAGING</td>
                      <td>OVER FUP-1</td>
                      <td style="background-color: #61876E;">3,338</td>
                      <td style="background-color: #61876E;">3,757</td>
                      <td style="background-color: #61876E;">3,855</td>
                      <td style="background-color: #61876E;">1,636</td>
                      <td style="background-color: #61876E;">1,180</td>
                      <td style="background-color: #61876E;">1,859</td>
                      <td style="background-color: #61876E;">2,998</td>
                      <!-- <td></td>
                      <td></td> -->
                    </tr>
                    <tr>
                      <td>LEVERAGING</td>
                      <td>OVER FUP-2</td>
                      <td style="background-color: #61876E;">1,270</td>
                      <td style="background-color: #61876E;">1,258</td>
                      <td style="background-color: #61876E;">1,153</td>
                      <td style="background-color: #61876E;">489</td>
                      <td style="background-color: #61876E;">303</td>
                      <td style="background-color: #61876E;">522</td>
                      <td style="background-color: #61876E;">846</td>
                      <!-- <td></td>
                      <td></td> -->
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
    <script src="js/view_witel.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/sc-2.0.7/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/sc-2.0.7/datatables.min.js"></script>
@stop
