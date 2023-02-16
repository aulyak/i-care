<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\dataImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;
use App\Services\CsvService;
use App\Models\QOS;
use Barryvdh\Debugbar\Facades\Debugbar;
use Carbon\Carbon;
use DB;

class QoSController extends Controller
{
  public function qosBySales(Request $request)
  {
    $testYear = '2022';
    $testMaxMonth = 1;
    $agingQuery = [0,1,6,7,8,12,13,14,18];
    $result = array();
    for ($i=1; $i <= $testMaxMonth ; $i++) {
      if ($i < 10 ) $i = '0'.$i;
      $rawdata = array();
      $rawdata['BULAN_SALES'] = $testYear.$i;
      $rawdata['AGING_COUNT'] = QOS::select(DB::raw('count(*) as total_aging'))
      ->where('BULAN_SALES','=',$testYear.$i)
      ->groupBy('AGING')
      ->pluck('total_aging')->toArray();
      $rawdata['AGING_PERCENTAGE'] = array();
      for ($y=1; $y <= count($rawdata['AGING_COUNT']) ; $y++) { 
        $agingPercentage = ($rawdata['AGING_COUNT'][$y-1] / $rawdata['AGING_COUNT'][0]);
        array_push($rawdata['AGING_PERCENTAGE'],$agingPercentage);
      }
      array_push($result,$rawdata);
    }
    // dd($result);
    return view('qos.qos_by_sales',compact('result','agingQuery'));
  }

  public function qosByWitel(Request $request)
  {
    return view('qos.qos_by_witel');
  }

  public function rawdata(Request $request)
  {
    $rawdata = QOS::all();
    return response()->json($rawdata);
  }
}