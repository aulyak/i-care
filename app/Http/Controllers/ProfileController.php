<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProfileHelperService;

class ProfileController extends Controller
{
  public function profileLeveraging(Request $request, ProfileHelperService $PHS)
  {
    $data = [
      'OPTIONS' => $PHS->buildOption(['WITEL', 'STO', 'TEHNO', 'PLBLCL', 'KAT_ARPU', 'KWADRAN_INET', 'RANGE_UMUR', 'SPEED', 'JAM_GANGGUAN']),
      'OVERVIEW' => $PHS->buildOverview(['ALL_DATA', '1P INET', '2P (POTS-INET)', '3P', 'HOMEWIFI', '2P BRITE']),
      'CHART' => $PHS->buildChart([
        'PRODUCT_TYPE',
        'PROPORSI_PRODUCT',
        'USAGE',
        'FUP',
        'KATEGORY_ARPU',
        'JUMLAH_GANGGUAN',
      ]),
      'TABLE' => $PHS->buildTable([
        'PROUCT_TYPE_BY_WITEL',
        'ARPU_X_SPEED'
      ])
    ];
    \Debugbar::log($data);
    return view('profile.leveraging', compact('data'));
  }

  public function profileRetention(Request $request, ProfileHelperService $PHS)
  {
    $data = [
      'OPTIONS' => $PHS->buildOption(['WITEL', 'STO', 'SEGMENT', 'PERIODE', 'KET_CT02']),
      'OVERVIEW' => $PHS->buildOverview(['TOTAL_CTO', 'CAPS', 'CTO', 'CTO NDE', 'ABNOL', 'DUNNING', 'HOMEWIFI', 'CABUT']),
      'CHART' => $PHS->buildChart([
        'KETERANGAN_CTO',
        'PROPORSI_CTO',
        'CTO_PER_SEGMEN',
        'CTO_PER_WITEL',
      ]),
      'TABLE' => $PHS->buildTable([
        'CTO_PER_UMUR_CTO',
        'DETAIL_PER_WITEL'
      ]),
    ];
    \Debugbar::log($data);
    return view('profile.retention', compact('data'));
  }

  public function profileListKwadran(Request $request, ProfileHelperService $PHS)
  {
    $data = [
      'OPTIONS' => $PHS->buildOption(['WITEL']),
      'TABLE' => $PHS->buildTable([
        'PROFILE_KUARAN_COSTUMER',
      ]),
    ];
    \Debugbar::log($data);
    return view('profile.list_kwadran', compact('data'));
  }

  public function profileChurn(Request $request, ProfileHelperService $PHS)
  {
    $data = [
      'TABLE' => $PHS->buildTable([
        'DISTRIBUSI_CHURN_TO_SALES_PER_WITEL',
        'BREAKDOWN_DISTRIBUSI_CHURN'
      ]),
    ];
    \Debugbar::log($data);
    return view('profile.churn_to_sales', compact('data'));
  }
}
