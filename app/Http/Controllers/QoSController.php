<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QOS;
use App\Services\QosHelperService;

class QoSController extends Controller
{
  public function qosBySales(Request $request, QosHelperService $QHS)
  {
    $agingQuery = $QHS->getAgingQuery();
    $result =  $QHS->buildQuery('BULAN_SALES');
    $options = $QHS->buildOptions(['WITEL', 'STO', 'PRODUCT', 'CCAT', 'KWADRAN_INET']);
    return view('qos.qos_by', compact('result', 'agingQuery', 'options'));
  }

  public function qosByWitel(Request $request, QosHelperService $QHS)
  {
    $agingQuery = $QHS->getAgingQuery();
    $result =  $QHS->buildQuery('WITEL');
    $options = $QHS->buildOptions(['BULAN_SALES', 'PRODUCT', 'CCAT', 'KWADRAN_INET']);
    return view('qos.qos_by', compact('result', 'agingQuery', 'options'));
  }

  public function rawdata(Request $request)
  {
    $rawdata = QOS::all();
    return response()->json($rawdata);
  }
}
