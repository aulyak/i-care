@extends('adminlte::page')

@section('content_header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profile Kuadran Customer</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">List & Kwadran</a></li>
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
            <div class="col-sm-12 col-md-4">
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
            <button type="submit" class="btn btn-primary">Submit</button>
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

        <div class="card">
          <!-- <div class="card-header">
                  <h3 class="card-title">DataTable with default features</h3>
                </div> -->
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="background-color: #68d7fa;">WITEL</th>
                  <th style="background-color: #357af6;">LIS</th>
                  <th style="background-color: #eb5d32;">CTO</th>
                  <th style="background-color: #eb5d32;">%CTO TO LIS</th>
                  <th style="background-color: #f2ad86;">HOMEWIFI</th>
                  <th style="background-color: #f2ad86;">%HW TO LIS</th>
                  <th style="background-color: #dfeaef;">KW1</th>
                  <th style="background-color: #dfeaef;">%KW1 TO LIS</th>
                  <th style="background-color: #dfeaef;">KW2</th>
                  <th style="background-color: #dfeaef;">%KW2 TO LIS</th>
                  <th style="background-color: #dfeaef;">KW3</th>
                  <th style="background-color: #dfeaef;">%KW3 TO LIS</th>
                  <th style="background-color: #e8ecdb;">KW4</th>
                  <th style="background-color: #e8ecdb;">%KW4 TO LIS</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>BANTEN</td>
                  <td>135,072</td>
                  <td>12,658</td>
                  <td style="color: #eed37c;">9.37%</td>
                  <td>13,032</td>
                  <td style="color: #5e8f69;">9.65%</td>
                  <td>12,855</td>
                  <td style="background-color: #e3906d;">9.52%</td>
                  <td>8,433</td>
                  <td style="color: #5e8f69;">6.24%</td>
                  <td>473</td>
                  <td style="color: #eed37c;">0.35%</td>
                  <td>113,311</td>
                  <td style="color: #5e8f69;">83.89%</td>
                </tr>
                <tr>
                  <td>BEKASI</td>
                  <td>135,072</td>
                  <td>12,658</td>
                  <td style="color: #eed37c;">9.37%</td>
                  <td>13,032</td>
                  <td style="color: #5e8f69;">9.65%</td>
                  <td>12,855</td>
                  <td style="background-color: #e3906d;">9.52%</td>
                  <td>8,433</td>
                  <td style="color: #5e8f69;">6.24%</td>
                  <td>473</td>
                  <td style="color: #eed37c;">0.35%</td>
                  <td>113,311</td>
                  <td style="color: #5e8f69;">83.89%</td>
                </tr>
                <tr>
                  <td>BOGOR</td>
                  <td>135,072</td>
                  <td>12,658</td>
                  <td style="color: #eed37c;">9.37%</td>
                  <td>13,032</td>
                  <td style="color: #5e8f69;">9.65%</td>
                  <td>12,855</td>
                  <td style="background-color: #e3906d;">9.52%</td>
                  <td>8,433</td>
                  <td style="color: #5e8f69;">6.24%</td>
                  <td>473</td>
                  <td style="color: #eed37c;">0.35%</td>
                  <td>113,311</td>
                  <td style="color: #5e8f69;">83.89%</td>
                </tr>
                <tr>
                  <td>JAKBAR</td>
                  <td>135,072</td>
                  <td>12,658</td>
                  <td style="color: #eed37c;">9.37%</td>
                  <td>13,032</td>
                  <td style="color: #5e8f69;">9.65%</td>
                  <td>12,855</td>
                  <td style="background-color: #e3906d;">9.52%</td>
                  <td>8,433</td>
                  <td style="color: #5e8f69;">6.24%</td>
                  <td>473</td>
                  <td style="color: #eed37c;">0.35%</td>
                  <td>113,311</td>
                  <td style="color: #5e8f69;">83.89%</td>
                </tr>
                <tr>
                  <td>JAKPUS</td>
                  <td>135,072</td>
                  <td>12,658</td>
                  <td style="color: #eed37c;">9.37%</td>
                  <td>13,032</td>
                  <td style="color: #5e8f69;">9.65%</td>
                  <td>12,855</td>
                  <td style="background-color: #e3906d;">9.52%</td>
                  <td>8,433</td>
                  <td style="color: #5e8f69;">6.24%</td>
                  <td>473</td>
                  <td style="color: #eed37c;">0.35%</td>
                  <td>113,311</td>
                  <td style="color: #5e8f69;">83.89%</td>
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

@section('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/sc-2.0.7/datatables.min.css" />
@stop

@section('js')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/sc-2.0.7/datatables.min.js">
</script>
<script src="js/app.js"></script>
{{-- <script src="js/list_kwadran.js"></script> --}}
<script>
  $(function() {
    // $("#example1").DataTable({
    //   "responsive": true, "lengthChange": false, "autoWidth": true,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    //   "scrollX": true,
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      // "responsive": true,
      "scrollX": true,
      "pageLength": 3
      // "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
      // "pageLength": 50
    });
    $('#arpuxSpeed').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      // "responsive": true,
      "scrollX": true,
      "pageLength": 10
      // "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
      // "pageLength": 50
    });
  });
</script>
@stop