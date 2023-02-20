<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QOS as QOS;
use App\Services\QosHelperService;

class QoSController extends Controller
{
  public $QHS;
  function __construct(Request $request)
  {
    $this->QHS = new QosHelperService('QOS', NULL, $request);
  }
  public function qosBySales(Request $request)
  {
    $agingQuery = $this->QHS->getAgingQuery();
    $result =  $this->QHS->buildQuery('BULAN_SALES');
    $options = $this->QHS->buildOptions(['WITEL', 'STO', 'PRODUCT', 'CCAT', 'KWADRAN_INET']);
    $pageType = 'Month';
    return view('qos.qos_by', compact('result', 'agingQuery', 'options', 'pageType'));
  }

  public function qosByWitel(Request $request)
  {
    $agingQuery = $this->QHS->getAgingQuery();
    $result =  $this->QHS->buildQuery('WITEL');
    $options = $this->QHS->buildOptions(['BULAN_SALES', 'PRODUCT', 'CCAT', 'KWADRAN_INET']);
    $pageType = 'Witel';
    return view('qos.qos_by', compact('result', 'agingQuery', 'options', 'pageType'));
  }

  public function rawdata(Request $request)
  {
    $rawdata = QOS::all();
    return response()->json($rawdata);
  }
}
