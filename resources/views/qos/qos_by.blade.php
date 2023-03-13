@extends('adminlte::page')

@section('content_header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">Quality Of Sales / <a href="#">Sales by {{ $pageType }}</a></li>
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
            @foreach ($options as $option)
            <div class="col-sm-6 col-md-2">
              <div class="form-group">
                <label>{{$option['LABEL']}}</label>
                <select name="{{$option['KEY']}}" class="form-control">
                  @foreach ($option['DATA'] as $DATA )
                  @if ($option['VALUE'] == $DATA)
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
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- <div class="card-header">
                          <h3 class="card-title">DataTable with default features</h3>
                        </div> -->
          <!-- /.card-header -->
          <div class="card-body">
            <table id="qos_table" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th rowspan="2">Bulan Sales</th>
                  <th colspan="6">0-6 Bulan</th>
                  <th><?php
                      $sum = 0;
                      foreach ($result as $res) {
                        if (count($res['AGING_AVERAGE']) > 6) {
                          $sum += $res['AGING_AVERAGE'][6];
                        } else {
                          // dd($res);
                          $sum += $res['AGING_AVERAGE'][count($res['AGING_AVERAGE']) - 1];
                        }
                      }
                      echo round($sum / count($result), 2) * 100 . "%"
                      ?></th>
                  <th colspan="5">7-12 Bulan</th>
                  <th><?php
                      $sum = 0;
                      foreach ($result as $res) {
                        if (count($res['AGING_AVERAGE']) > 12) {
                          $sum += $res['AGING_AVERAGE'][12];
                        } else {
                          // dd($res);
                          $sum += $res['AGING_AVERAGE'][count($res['AGING_AVERAGE']) - 1];
                        }
                      }
                      echo round($sum / count($result), 2) * 100 . "%"
                      ?></th>
                  <th colspan="5">13-18 Bulan</th>
                  <th><?php
                      $sum = 0;
                      foreach ($result as $res) {
                        if (count($res['AGING_AVERAGE']) > 18) {
                          $sum += $res['AGING_AVERAGE'][18];
                        } else {
                          // dd($res);
                          $sum += $res['AGING_AVERAGE'][count($res['AGING_AVERAGE']) - 1];
                        }
                      }
                      echo round($sum / count($result), 2) * 100 . "%"
                      ?></th>
                </tr>
                <tr>
                  @foreach ($agingQuery as $aq)
                  <th>{{$aq}}</th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
                @foreach ($result as $res)
                <tr>
                  <td>{{ ($res['GROUP'] ?? '-') }}</td>
                  @foreach ($agingQuery as $aq)
                  @if ($aq < count($res['AGING_PERCENTAGE'])) <td style="background-color: <?= ($res['AGING_PERCENTAGE'][$aq] < 0.92 ? ($res['AGING_PERCENTAGE'][$aq] < 0.77 ? ($res['AGING_PERCENTAGE'][$aq] < 0.61 ? 'red' : 'orange') : 'yellow') : 'green') ?>;">{{ (round($res['AGING_PERCENTAGE'][$aq],2)*100 . '%' ?? '') }}</td>
                    @else
                    <td style="background-color: grey;"></td>
                    @endif
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
      <!-- /.col -->
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
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/sc-2.0.7/datatables.min.js">
</script>
<script src="js/app.js"></script>
<script>
  $("#qos_table").DataTable({
    "responsive": false,
    "scrollX": true,
    "lengthChange": false,
    "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>
@stop