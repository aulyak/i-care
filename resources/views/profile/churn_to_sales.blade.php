@extends('adminlte::page')
@section('content_header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <!-- <h1></h1> -->
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">Profile Overview / <a href="#">Churn to Sales</a></li>
        </ol>
      </div><!-- /.col -->
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
          <div class="card-header">
            <h3 class="card-title">Distribusi Churn to Sales per Witel</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>WITEL</th>
                  <th>TOTAL CHURN</th>
                  <th>TOTAL SALES</th>
                  <th>% CHURN TO SALES</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>BANTEN</td>
                  <td style="color: #a8c8a1;">10,468</td>
                  <td style="color: #a8c8a1;">31,355</td>
                  <td style="color: #a8c8a1;">33%</td>
                </tr>
                <tr>
                  <td>BEKASI</td>
                  <td style="color: #f0d88d;">29,872</td>
                  <td style="color: #f0d88d;">55,983</td>
                  <td style="color: #f0d88d;">53%</td>
                </tr>
                <tr>
                  <td>BOGOR</td>
                  <td style="color: #a8c8a1;">10,468</td>
                  <td style="color: #a8c8a1;">31,355</td>
                  <td style="color: #a8c8a1;">33%</td>
                </tr>
                <tr>
                  <td>JAKBAR</td>
                  <td style="color: #f0d88d;">29,872</td>
                  <td style="color: #f0d88d;">55,983</td>
                  <td style="color: #f0d88d;">53%</td>
                </tr>
                <tr>
                  <td>JAKPUS</td>
                  <td style="color: #c26770;">24,095</td>
                  <td style="color: #c26770;">17,151</td>
                  <td style="color: #c26770;">140%</td>
                </tr>
                <tr>
                  <td>JAKSEL</td>
                  <td style="color: #e2906d;">25,909</td>
                  <td style="color: #e2906d;">39,425</td>
                  <td style="color: #e2906d;">66%</td>
                </tr>
                <tr>
                  <td>JAKTIM</td>
                  <td style="color: #f0d88d;">29,872</td>
                  <td style="color: #f0d88d;">55,983</td>
                  <td style="color: #f0d88d;">53%</td>
                </tr>
                <tr>
                  <td>JAKUT</td>
                  <td style="color: #e2906d;">25,909</td>
                  <td style="color: #e2906d;">39,425</td>
                  <td style="color: #e2906d;">66%</td>
                </tr>
                <tr>
                  <td>TANGERANG</td>
                  <td style="color: #f0d88d;">29,872</td>
                  <td style="color: #f0d88d;">55,983</td>
                  <td style="color: #f0d88d;">53%</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td>GRAND TOTAL</td>
                  <td style="color: #f0d88d;">29,872</td>
                  <td style="color: #f0d88d;">55,983</td>
                  <td style="color: #f0d88d;">53%</td>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">BREAKDOWN DISTRIBUSI CHURN</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="arpuxSpeed" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th rowspan="2" style="background-color: #75fbfd;">WITEL</th>
                  <th colspan="3" style="background-color: #75fbfd;">
                    < 10%</th>
                  <th colspan="3" style="background-color: #75fbfd;">10 - 50%</th>
                  <th colspan="3" style="background-color: #75fbfd;">50 - 100%</th>
                  <th colspan="3" style="background-color: #75fbfd;">> 100%</th>
                </tr>
                <tr>
                  <th style="background-color: #f9db8e;">Jumlah Churn</th>
                  <th style="background-color: #f9db8e;">% Churn of Total Churn</th>
                  <th style="background-color: #f9db8e;">Jumlah STO</th>
                  <th style="background-color: #f9db8e;">Jumlah Churn</th>
                  <th style="background-color: #f9db8e;">% Churn of Total Churn</th>
                  <th style="background-color: #f9db8e;">Jumlah STO</th>
                  <th style="background-color: #f9db8e;">Jumlah Churn</th>
                  <th style="background-color: #f9db8e;">% Churn of Total Churn</th>
                  <th style="background-color: #f9db8e;">Jumlah STO</th>
                  <th style="background-color: #f9db8e;">Jumlah Churn</th>
                  <th style="background-color: #f9db8e;">% Churn of Total Churn</th>
                  <th style="background-color: #f9db8e;">Jumlah STO</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="background-color: #75fbfd;">BANTEN</td>
                  <td style="color: #83b870;">379</td>
                  <td></td>
                  <td style="color: #83b870;">285</td>
                  <td style="color: #83b870;">691</td>
                  <td style="color: #d14c49;">7,865</td>
                  <td></td>
                  <td style="color: #83b870;">89</td>
                  <td style="color: #e88771;">1,900</td>
                  <td style="color: #d14c49;">11,209</td>
                  <td></td>
                  <td style="color: #83b870;">89</td>
                  <td style="color: #e88771;">1,900</td>
                </tr>
                <tr>
                  <td style="background-color: #75fbfd;">BEKASI</td>
                  <td style="color: #83b870;">789</td>
                  <td></td>
                  <td style="color: #83b870;">744</td>
                  <td style="color: #e88771;">1,308</td>
                  <td style="color: #d14c49;">13,322</td>
                  <td></td>
                  <td style="color: #e88771;">1,739</td>
                  <td style="color: #d14c49;">13,138</td>
                  <td style="color: #d14c49;">31,040</td>
                  <td></td>
                  <td style="color: #83b870;">89</td>
                  <td style="color: #e88771;">1,900</td>
                </tr>
                <tr>
                  <td style="background-color: #75fbfd;">BOGOR</td>
                  <td style="color: #83b870;">805</td>
                  <td></td>
                  <td style="color: #e88771;">1,479</td>
                  <td style="color: #e88771;">1,521</td>
                  <td style="color: #d14c49;">13,271</td>
                  <td style="color: #83b870;">11</td>
                  <td style="color: #83b870;">700</td>
                  <td style="color: #e88771;">7,675</td>
                  <td style="color: #d14c49;">25,462</td>
                  <td></td>
                  <td style="color: #83b870;">89</td>
                  <td style="color: #e88771;">1,900</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.card -->
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
    $('#example2').DataTable({
      ...defaultVar,
    });
    $('#arpuxSpeed').DataTable({
      ...defaultVar,
      "pageLength": 3
    });
  });
</script>
@stop