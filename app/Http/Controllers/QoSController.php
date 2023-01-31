<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\dataImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;
use App\Services\CsvService;
use Carbon\Carbon;

class QoSController extends Controller
{
  public function qosBySales(Request $request)
  {
    return view('qos.qos_by_sales');
  }

  public function qosByWitel(Request $request)
  {
    return view('qos.qos_by_witel');
  }
}