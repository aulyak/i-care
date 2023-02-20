<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProfileHelperService;

class ProfileController extends Controller
{
  public $PHS;
  function __construct(Request $request)
  {
    // Nothing
  }
  public function profileLeveraging(Request $request)
  {
    $data = [
      'OPTIONS' => $this->PHS->buildOption(['WITEL', 'STO', 'TEHNO', 'PLBLCL', 'KAT_ARPU', 'KWADRAN_INET', 'RANGE_UMUR', 'SPEED', 'JAM_GANGGUAN']),
      'OVERVIEW' => $this->PHS->buildOverview(['ALL_DATA', '1P INET', '2P (POTS-INET)', '3P', 'HOMEWIFI', '2P BRITE']),
      'CHART' => $this->PHS->buildChart(['PRODUCT_TYPE', 'PROPORSI_PRODUCT', 'USAGE', 'FUP', 'KATEGORY_ARPU', 'JUMLAH_GANGGUAN',]),
      'TABLE' => $this->PHS->buildTable(['PROUCT_TYPE_BY_WITEL', 'ARPU_X_SPEED'])
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
      'TABLE' => $this->PHS->buildTable([
        'PROFILE_KUARAN_COSTUMER',
      ]),
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
