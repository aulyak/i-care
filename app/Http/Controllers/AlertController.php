<?php

namespace App\Http\Controllers;

use App\Actions\ProcessData;
use Illuminate\Http\Request;
use App\Services\CsvService;
use Carbon\Carbon;

class AlertController extends Controller
{
  private $alertData, $distinctWitel, $distinctSto, $distinctBulanAlert, $distinctStatus, $distinctKategoriHvc, $distinctHvcWaGroup;

  public function __construct(CsvService $csvService)
  {
    // $this->alertData = $csvService->readCsv('storage/Alert.csv');
    // $this->distinctWitel = $csvService->getUniqueByRowName($this->alertData, 'witel');
    // $this->distinctSto = $csvService->getUniqueByRowName($this->alertData, 'sto');
    // $this->distinctBulanAlert = $csvService->getUniqueByRowName($this->alertData, 'bulan_alert');
    // $this->distinctStatus = $csvService->getUniqueByRowName($this->alertData, 'status');
    // $this->distinctKategoriHvc = $csvService->getUniqueByRowName($this->alertData, 'atribut');
    // $this->distinctHvcWaGroup = $csvService->getUniqueByRowName($this->alertData, 'hvc_wa_group');
  }

  public function viewByAge(Request $request, ProcessData $processData)
  {
    $witel = $request->witel;
    $sto = $request->sto;
    $bulanAlert = $request->bulanAlert;
    $status = $request->status;
    $kategoriHvc = $request->kategoriHvc;
    $hvcWaGroup = $request->hvcWaGroup;

    $filteredData = $processData->filter($witel, $sto, $bulanAlert, $status, $kategoriHvc, $hvcWaGroup, $this->alertData);

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


    return view('alert.view_by_age', array_merge(
      compact(
        'filteredData',
        'arrThColumn',
        'witel',
        'sto',
        'bulanAlert',
        'status',
        'kategoriHvc',
        'hvcWaGroup',
      ),
      [
        'distinctWitel' => $this->distinctWitel,
        'distinctSto' => $this->distinctSto,
        'distinctBulanAlert' => $this->distinctBulanAlert,
        'distinctStatus' => $this->distinctStatus,
        'distinctKategoriHvc' => $this->distinctKategoriHvc,
        'distinctHvcWaGroup' => $this->distinctHvcWaGroup,
      ]
    ));
  }

  public function viewByWitel(Request $request, ProcessData $processData)
  {
    $witel = $request->witel;
    $sto = $request->sto;
    $bulanAlert = $request->bulanAlert;
    $status = $request->status;
    $kategoriHvc = $request->kategoriHvc;
    $hvcWaGroup = $request->hvcWaGroup;

    $filteredData = $processData->filter($witel, $sto, $bulanAlert, $status, $kategoriHvc, $hvcWaGroup, $this->alertData);

    return view('alert.view_by_witel', array_merge(
      compact(
        'filteredData',
        'witel',
        'sto',
        'bulanAlert',
        'status',
        'kategoriHvc',
        'hvcWaGroup',
      ),
      [
        'distinctWitel' => $this->distinctWitel,
        'distinctSto' => $this->distinctSto,
        'distinctBulanAlert' => $this->distinctBulanAlert,
        'distinctStatus' => $this->distinctStatus,
        'distinctKategoriHvc' => $this->distinctKategoriHvc,
        'distinctHvcWaGroup' => $this->distinctHvcWaGroup,
      ]
    ));
  }

  public function viewUpdate(Request $request, ProcessData $processData)
  {
    $witel = $request->witel;
    $sto = $request->sto;
    $bulanAlert = $request->bulanAlert;
    $status = $request->status;
    $kategoriHvc = $request->kategoriHvc;
    $hvcWaGroup = $request->hvcWaGroup;

    $filteredData = $processData->filter($witel, $sto, $bulanAlert, $status, $kategoriHvc, $hvcWaGroup, $this->alertData);

    return view('alert.view_update', array_merge(
      compact(
        'filteredData',
        'witel',
        'sto',
        'bulanAlert',
        'status',
        'kategoriHvc',
        'hvcWaGroup',
      ),
      [
        'distinctWitel' => $this->distinctWitel,
        'distinctSto' => $this->distinctSto,
        'distinctBulanAlert' => $this->distinctBulanAlert,
        'distinctStatus' => $this->distinctStatus,
        'distinctKategoriHvc' => $this->distinctKategoriHvc,
        'distinctHvcWaGroup' => $this->distinctHvcWaGroup,
      ]
    ));
  }
}
