<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProfileHelperService;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
  public $PHS;
  function __construct(Request $request)
  {
    // Nothing
  }
  public function profileCaching($cachekey, Request $request)
  {
    $key = explode('-', $cachekey);
    $this->PHS = new ProfileHelperService($key[0], NULL, $request);
    $resp = '';
    if ($key[1] == 'option') $resp = $this->PHS->buildOption(array($key[2]));
    if ($key[1] == 'overview') $resp = $this->PHS->buildOverview(array($key[2]));
    if ($key[1] == 'chart') $resp = $this->PHS->buildChart(array($key[2]));
    if ($key[1] == 'table') $resp = $this->PHS->buildTable(array($key[2]));
    return $resp;
  }

  public function profileLeveraging(Request $request)
  {
    $this->PHS = new ProfileHelperService('ProfileLeveraging', NULL, $request);
    $options = ['WITEL', 'STO', 'TECHNO', 'PLBLCL', 'KAT_ARPU', 'KWADRAN_INDIHOME', 'RANGE_UMUR', 'SPEED', 'JML_GANGGUAN'];
    $overviews = ['ALL_DATA', '1P_INET', '2P_POTS_INET', '3P', '', '2P_INET_USEE'];
    $charts = ['PRODUCT_TYPE', 'PROPORSI_PRODUCT', 'USAGE', 'FUP', 'KATEGORY_ARPU', 'JUMLAH_GANGGUAN'];
    $tables = ['PROUCT_TYPE_BY_WITEL', 'ARPU_X_SPEED'];
    $data = [
      'OPTIONS' => $this->PHS->buildOption($options),
      'OVERVIEW' => $this->PHS->buildOverview($overviews),
      'CHART' => $this->PHS->buildChart($charts),
      'TABLE' => $this->PHS->buildTable($tables)
    ];
    return view('profile.leveraging', compact('data'));
  }

  public function profileRetention(Request $request)
  {
    $this->PHS = new ProfileHelperService('ProfileRetention', NULL, $request);
    $data = [
      'OPTIONS' => $this->PHS->buildOption(['WITEL', 'STO', 'SEGMENT', 'PERIODE', 'KET_CT0']),
      'OVERVIEW' => $this->PHS->buildOverview(['TOTAL_CT0', 'CAPS', 'CT0', 'CT0 NDE', 'ABNOL', 'DUNNING', 'HOMEWIFI', 'CABUT']),
      'CHART' => $this->PHS->buildChart(['KETERANGAN_CT0', 'PROPORSI_CT0', 'CT0_PER_SEGMEN', 'CT0_PER_WITEL',]),
      'TABLE' => $this->PHS->buildTable(['CT0_PER_UMUR_CT0', 'DETAIL_PER_WITEL']),
    ];
    return view('profile.retention', compact('data'));
  }

  public function profileListKwadran(Request $request)
  {
    $this->PHS = new ProfileHelperService('ProfileListKwadran', NULL, $request);
    $data = [
      'OPTIONS' => $this->PHS->buildOption(['WITEL']),
      'TABLE' => $this->PHS->buildTable(['KUADRAN_PER_WITEL']),
    ];
    return view('profile.list_kwadran', compact('data'));
  }

  public function profileChurn(Request $request)
  {
    $this->PHS = new ProfileHelperService('ProfileChurn', NULL, $request);
    $data = [
      'TABLE' => $this->PHS->buildTable([
        'DISTRIBUSI_CHURN_TO_SALES_PER_WITEL',
        'BREAKDOWN_DISTRIBUSI_CHURN'
      ]),
    ];
    return view('profile.churn_to_sales', compact('data'));
  }
}
