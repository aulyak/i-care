<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\dataImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;
use App\Services\CsvService;
use Carbon\Carbon;

class AlertController extends Controller
{
  public function viewByAge(Request $request, CsvService $csvService)
  {
    $witel = $request->witel;
    $sto = $request->sto;
    $bulanAlert = $request->bulanAlert;
    $status = $request->status;
    $kategoriHvc = $request->kategoriHvc;
    $hvcWaGroup = $request->hvcWaGroup;

    $arrRequestMapCsv = [
      'witel' => $witel,
      'sto' => $sto,
      'bulan_alert' => $bulanAlert,
      'status' => $status,
      'atribut' => $kategoriHvc,
      'hvc_wa_group' => $hvcWaGroup,
    ];

    $alertData = $csvService->readCsv('storage/Alert.csv');

    $distinctWitel = $csvService->getUniqueByRowName($alertData, 'witel');
    $distinctSto = $csvService->getUniqueByRowName($alertData, 'sto');
    $distinctBulanAlert = $csvService->getUniqueByRowName($alertData, 'bulan_alert');
    $distinctStatus = $csvService->getUniqueByRowName($alertData, 'status');
    $distinctKategoriHvc = $csvService->getUniqueByRowName($alertData, 'atribut');
    $distinctHvcWaGroup = $csvService->getUniqueByRowName($alertData, 'hvc_wa_group');

    $filteredData = $alertData;
    foreach ($arrRequestMapCsv as $key => $value) {
      if ($value) {
        $filteredData = $filteredData->filter(function ($row) use ($key, $value) {
          return $row[$key] == $value;
        });
      }
    }

    $arrThColumn = null;
    $newestBulanAlert = Carbon::now()->format('Ym');
    if ($filteredData->count() !== 0) {
      $sortedData = $filteredData->sortByDesc('bulan_alert');
      $sortedDataWkey = $sortedData->values()->all();
      $newestBulanAlert = $sortedDataWkey[0]['bulan_alert'];
    }

    $arrThColumn = [$newestBulanAlert];
    $newestBulanAlertYear = substr($newestBulanAlert, 0, 4);
    $newestBulanAlertMonth = substr($newestBulanAlert, -2);
    $newestDate = Carbon::createFromFormat('Y-m-d H:i:s', $newestBulanAlertYear . '-' . $newestBulanAlertMonth . '-' . '01' . ' 00:00:00');

    for ($i = 1; $i <= 17; $i++) {
      $prevDate = (int) $newestDate->subMonth(1)->format('Ym');
      array_push($arrThColumn, $prevDate);
    }

    sort($arrThColumn);


    return view('alert.view_by_age', compact(
      'arrThColumn',
      'filteredData',
      'distinctWitel',
      'distinctSto',
      'distinctBulanAlert',
      'distinctStatus',
      'distinctKategoriHvc',
      'distinctHvcWaGroup',
      'witel',
      'sto',
      'distinctSto',
      'bulanAlert',
      'status',
      'kategoriHvc',
      'hvcWaGroup',
    ));
  }

  public function viewByWitel(Request $request)
  {
    return view('alert.view_by_witel');
  }

  public function viewUpdate(Request $request)
  {
    return view('alert.view_update');
  }
}