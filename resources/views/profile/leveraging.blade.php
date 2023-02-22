@extends('adminlte::page')

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
            @foreach ($data['OPTIONS'] as $OPTION )
            <div class="col-sm-4 col-md-{{ (strlen($OPTION['LABEL']) < 9 ? '1':'2')}}">
              <div class="form-group">
                <label>{{$OPTION['LABEL']}}</label>
                <select name="{{$OPTION['KEY']}}" class="form-control">
                  @foreach ($OPTION['DATA'] as $DATA )
                  @if ($OPTION['VALUE'] == $DATA)
                  <option selected="selected" value="{{$DATA}}">{{$DATA}}</option>
                  @else
                  <option value="{{$DATA}}">{{$DATA}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
            </div>
            @endforeach
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <!-- input states -->
        </form>
      </div>
      <!-- /.card-header -->
    </div>
  </div>
</div>
@stop

@section('content')
<section class="content">
  <div class="container-fluid">
    <!-- OVERVIEW-->
    <div class="row">
      <div class="col-sm-12 col-md-8">
        <div class="row" style="font-size: 80%;">
          <div class="col-sm-4 col-md-2" style="text-align: center;">
            <div class="color-palette-set border">
              <div class="bg-info color-palette" style="font-weight: bold;"><span>ALL DATA</span></div>
              <div class="bg-light color-palette"><span>{{ $data['OVERVIEW']['ALL_DATA']}}</span></div>
            </div>
          </div>
          <div class="col-sm-4 col-md-2" style="text-align: center;">
            <div class="color-palette-set border">
              <div class="color-palette" style="background-color:chocolate; color: white; font-weight: bold;"><span>1P INET</span></div>
              <div class="bg-light color-palette"><span>{{ $data['OVERVIEW']['1P_INET']}}</span></div>
            </div>
          </div>
          <div class="col-sm-4 col-md-2" style="text-align: center;">
            <div class="color-palette-set border">
              <div class="bg-success color-palette" style="font-weight: bold;"><span>2P (POTS-INET)</span></div>
              <div class="bg-light color-palette"><span>{{ $data['OVERVIEW']['2P_POTS_INET']}}</span></div>
            </div>
          </div>
          <div class="col-sm-4 col-md-2" style="text-align: center;">
            <div class="color-palette-set border">
              <div class="bg-primary color-palette" style="font-weight: bold;"><span>3P</span></div>
              <div class="bg-light color-palette"><span>{{ $data['OVERVIEW']['3P']}}</span></div>
            </div>
          </div>
          <div class="col-sm-4 col-md-2" style="text-align: center;">
            <div class="color-palette-set border">
              <div class="bg-danger color-palette" style="font-weight: bold;"><span>HOMEWIFI</span></div>
              <div class="bg-light color-palette"><span>{{ $data['OVERVIEW']['']}}</span></div>
            </div>
          </div>
          <div class="col-sm-4 col-md-2" style="text-align: center;">
            <div class="color-palette-set border">
              <div class="bg-danger color-palette" style="font-weight: bold;"><span>2P BRITE</span></div>
              <div class="bg-light color-palette"><span>{{ $data['OVERVIEW']['2P_INET_USEE']}}</span></div>
            </div>
          </div>
        </div>
        <div class="row" style=" margin-top: 1rem;">
          <div class="col-sm-12 col-md-8">
            <!-- BAR CHART -->
            <div class="card" style="height: 25rem;">
              <div class="card-header" style="text-align: center;">
                <h3 class="card-title">Product Type</h3>
              </div>
              <div class="card-body">
                <div class="chart">
                  <!-- <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
                  {!! $data['CHART']['PRODUCT_TYPE']->render() !!}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <!-- PIE CHART -->
            <div class="card" style="height: 25rem;">
              <div class="card-header" style="text-align: center;">
                <h3 class="card-title">Proporsi Product</h3>
              </div>
              <div class="card-body">
                <!-- <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
                {!! $data['CHART']['PROPORSI_PRODUCT']->render() !!}
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
            <h3 class="card-title">{{ $data['TABLE']['PROUCT_TYPE_BY_WITEL']['TITLE'] }}</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="TBL_PROUCT_TYPE_BY_WITEL" class="table table-bordered table-striped">
              <thead>
                <tr>
                  @foreach ($data['TABLE']['PROUCT_TYPE_BY_WITEL']['HEAD'] as $head )
                  <th>{{ $head }}</th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
                @foreach ($data['TABLE']['PROUCT_TYPE_BY_WITEL']['ROW'] as $rows )
                <tr>
                  @foreach ($rows as $row)
                  <td>{{$row}}</td>
                  @endforeach
                </tr>
                @endforeach
              </tbody>
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
                  <!-- <canvas id="horizontalBarChartCanvas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
                  {!! $data['CHART']['USAGE']->render() !!}
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
                <!-- <canvas id="fuphorizontalBarChartCanvas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
                {!! $data['CHART']['FUP']->render() !!}
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
                  <!-- <canvas id="kategoriArpuHorizontalBarChartCanvas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
                  {!! $data['CHART']['KATEGORY_ARPU']->render() !!}
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
                <!-- <canvas id="jumlahGangguanhorizontalBarChartCanvas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
                {!! $data['CHART']['JUMLAH_GANGGUAN']->render() !!}
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
            <h3 class="card-title">{{ $data['TABLE']['ARPU_X_SPEED']['TITLE'] }}</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="TBL_ARPU_X_SPEED" class="table table-bordered table-striped">
              <thead>
                <tr>
                  @foreach ($data['TABLE']['ARPU_X_SPEED']['HEAD'] as $head )
                  <th>{{ $head }}</th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
                @foreach ($data['TABLE']['ARPU_X_SPEED']['ROW'] as $rows )
                <tr>
                  @foreach ($rows as $row)
                  <td>{{$row}}</td>
                  @endforeach
                </tr>
                @endforeach
              </tbody>
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

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/sc-2.0.7/datatables.min.css" />
@stop

@section('js')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/sc-2.0.7/datatables.min.js"></script>
<script src="js/app.js"></script>
<script>
  $(function() {
    const defaultVar = {
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
    }
    $('#TBL_PROUCT_TYPE_BY_WITEL').DataTable({
      ...defaultVar,
    });
    $('#TBL_ARPU_X_SPEED').DataTable({
      ...defaultVar,
      "pageLength": 10
    });
  });
</script>
@stop