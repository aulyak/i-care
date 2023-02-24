<?php

namespace App\Http\Controllers;

use App\Actions\ProcessData;
use App\Models\Alert;
use App\Models\AlertAttribute;
use App\Models\Witel;
use Illuminate\Http\Request;
use App\Services\CsvService;
use Carbon\Carbon;

class AlertController extends Controller
{
  private $alertData, $distinctWitel, $distinctSto, $distinctBulanAlert, $distinctStatus, $distinctKategoriHvc, $distinctHvcWaGroup;

  private $currentYear, $currentMonth, $currentYearMonth;
  private $QUERY_LIMIT = 700;
  private $LIMIT_ACTIVE = true;

  public function __construct()
  {
    $currentDate = Carbon::now();
    $currentYear = $currentDate->year;
    $currentMonth = str_pad($currentDate->month, 2, '0', STR_PAD_LEFT);
    $this->currentYearMonth = '' . $currentYear . $currentMonth;
  }

  public function viewByAge(Request $request)
  {
    $distinctWitel = Witel::query()->distinct()->pluck('WITEL');
    $distinctSto = Witel::pluck('STO');
    $distinctBulanAlert = Alert::query()->whereNotIn('BULAN_ALERT', ['BULAN_', ''])->distinct()->pluck('BULAN_ALERT');
    $distinctStatus = Alert::query()->whereNotIn('STATUS', [''])->distinct()->pluck('STATUS');
    $distinctKategoriHvc = AlertAttribute::pluck('ATRIBUT');
    // $distinctHvcWaGroup = Alert::query()->distinct()->pluck('HVC_WA_GROUP');
    $distinctHvcWaGroup = collect(['Y', 'N', null]);

    $filteredData = Alert::select();
    $witel = '';
    $sto = '';
    $bulanAlert = '';
    $status =  '';
    $kategoriHvc = '';
    $hvcWaGroup = '';
    $bulanAlertPrevs = [];

    if ($request->all()) {
      $witel = $request->witel;
      $sto = $request->sto;
      $bulanAlert = $request->bulanAlert ? $request->bulanAlert : $this->currentYearMonth;
      $status = $request->status;
      $kategoriHvc = $request->kategoriHvc;
      $hvcWaGroup = $request->hvcWaGroup;
      $newestBulanAlert = $bulanAlert;
      array_push($bulanAlertPrevs, $newestBulanAlert);
      $newestBulanAlertYear = substr($newestBulanAlert, 0, 4);
      $newestBulanAlertMonth = substr($newestBulanAlert, -2);

      $newestDate = Carbon::createFromFormat('Y-m-d H:i:s', $newestBulanAlertYear . '-' . $newestBulanAlertMonth . '-' . '01' . ' 00:00:00');

      for ($i = 1; $i <= 17; $i++) {
        $prevDate = (int) $newestDate->subMonth(1)->format('Ym');
        array_push($bulanAlertPrevs, (string) $prevDate);
      }

      $filteredData = collect([]);
      foreach ($bulanAlertPrevs as $key => $value) {
        if (config('querylimit.alert.age.isLimit')) {
          $data = Alert::select()->when($witel, function ($query) use ($witel) {
            return $query->where('WITEL', $witel);
          })->when($sto, function ($query) use ($sto) {
            return $query->where('STO', $sto);
          })->when($status, function ($query) use ($status) {
            return $query->where('STATUS', $status);
          })->when($kategoriHvc, function ($query) use ($kategoriHvc) {
            return $query->where('ATRIBUT', $kategoriHvc);
          })->when($hvcWaGroup, function ($query) use ($hvcWaGroup) {
            return $query->where('HVC_WA_GROUP', $hvcWaGroup);
          })->where('BULAN_ALERT', $value)->limit(config('querylimit.alert.age.limitNum'));
          $filteredData = $filteredData->merge($data->get());
        } else {
          $data = Alert::select()->when($witel, function ($query) use ($witel) {
            return $query->where('WITEL', $witel);
          })->when($sto, function ($query) use ($sto) {
            return $query->where('STO', $sto);
          })->when($status, function ($query) use ($status) {
            return $query->where('STATUS', $status);
          })->when($kategoriHvc, function ($query) use ($kategoriHvc) {
            return $query->where('ATRIBUT', $kategoriHvc);
          })->when($hvcWaGroup, function ($query) use ($hvcWaGroup) {
            return $query->where('HVC_WA_GROUP', $hvcWaGroup);
          })->where('BULAN_ALERT', $value);
          $filteredData =  $filteredData->merge($data->get());
        }
      }
    } else {
      $newestBulanAlert = $this->currentYearMonth;
      array_push($bulanAlertPrevs, $newestBulanAlert);
      $newestBulanAlertYear = substr($newestBulanAlert, 0, 4);
      $newestBulanAlertMonth = substr($newestBulanAlert, -2);

      $newestDate = Carbon::createFromFormat('Y-m-d H:i:s', $newestBulanAlertYear . '-' . $newestBulanAlertMonth . '-' . '01' . ' 00:00:00');

      for ($i = 1; $i <= 17; $i++) {
        $prevDate = (int) $newestDate->subMonth(1)->format('Ym');
        array_push($bulanAlertPrevs, (string) $prevDate);
      }

      $filteredData = collect([]);
      foreach ($bulanAlertPrevs as $key => $value) {
        if (config('querylimit.alert.age.isLimit')) {
          $filteredData = $filteredData->merge(Alert::where('BULAN_ALERT', $value)->limit(config('querylimit.alert.age.limitNum'))->get());
        } else {
          $filteredData = $filteredData->merge(Alert::where('BULAN_ALERT', $value)->get());
        }
      }
    }


    $arrThColumn = $bulanAlertPrevs;

    sort($arrThColumn);

    return view(
      'alert.view_by_age',
      compact(
        'filteredData',
        'arrThColumn',
        'witel',
        'sto',
        'bulanAlert',
        'status',
        'kategoriHvc',
        'hvcWaGroup',
        'distinctWitel',
        'distinctSto',
        'distinctBulanAlert',
        'distinctStatus',
        'distinctKategoriHvc',
        'distinctHvcWaGroup',
      )
    );
  }

  public function viewByWitel(Request $request)
  {
    $distinctWitel = Witel::query()->distinct()->pluck('WITEL');
    $distinctSto = Witel::pluck('STO');
    $distinctBulanAlert = Alert::query()->whereNotIn('BULAN_ALERT', ['BULAN_', ''])->distinct()->pluck('BULAN_ALERT');
    $distinctStatus = Alert::query()->whereNotIn('STATUS', [''])->distinct()->pluck('STATUS');
    $distinctKategoriHvc = AlertAttribute::pluck('ATRIBUT');
    $distinctHvcWaGroup = collect(['Y', 'N', null]);

    $filteredData = Alert::select();
    $witel = '';
    $sto = '';
    $bulanAlert = '';
    $status =  '';
    $kategoriHvc = '';
    $hvcWaGroup = '';

    if ($request->all()) {
      $witel = $request->witel;
      $sto = $request->sto;
      $bulanAlert = $request->bulanAlert ? $request->bulanAlert : $this->currentYearMonth;
      $status = $request->status;
      $kategoriHvc = $request->kategoriHvc;
      $hvcWaGroup = $request->hvcWaGroup;
      $newestBulanAlert = $bulanAlert;
      $newestBulanAlertYear = substr($newestBulanAlert, 0, 4);
      $newestBulanAlertMonth = substr($newestBulanAlert, -2);

      $filteredData->when($witel, function ($query) use ($witel) {
        return $query->where('WITEL', $witel);
      })->when($sto, function ($query) use ($sto) {
        return $query->where('STO', $sto);
      })->when($status, function ($query) use ($status) {
        return $query->where('STATUS', $status);
      })->when($kategoriHvc, function ($query) use ($kategoriHvc) {
        return $query->where('ATRIBUT', $kategoriHvc);
      })->when($hvcWaGroup, function ($query) use ($hvcWaGroup) {
        return $query->where('HVC_WA_GROUP', $hvcWaGroup);
      })->where('BULAN_ALERT', $bulanAlert);
    } else {
      $filteredData->where('BULAN_ALERT', $this->currentYearMonth);
    }

    if (config('querylimit.alert.witel.isLimit')) {
      $filteredData->limit(config('querylimit.alert.witel.limitNum'));
    }

    $filteredData = $filteredData->get();

    return view(
      'alert.view_by_witel',
      compact(
        'filteredData',
        'witel',
        'sto',
        'bulanAlert',
        'status',
        'kategoriHvc',
        'hvcWaGroup',
        'distinctWitel',
        'distinctSto',
        'distinctBulanAlert',
        'distinctStatus',
        'distinctKategoriHvc',
        'distinctHvcWaGroup',
      )
    );
  }

  public function viewUpdate(Request $request, ProcessData $processData)

  {
    $distinctWitel = Witel::query()->distinct()->pluck('WITEL');
    $distinctSto = Witel::pluck('STO');
    $distinctBulanAlert = Alert::query()->whereNotIn('BULAN_ALERT', ['BULAN_', ''])->distinct()->pluck('BULAN_ALERT');
    $distinctStatus = Alert::query()->whereNotIn('STATUS', [''])->distinct()->pluck('STATUS');
    $distinctKategoriHvc = AlertAttribute::pluck('ATRIBUT');
    $distinctHvcWaGroup = collect(['Y', 'N', null]);

    $filteredData = Alert::select();
    $witel = '';
    $sto = '';
    $bulanAlert = '';
    $status =  '';
    $kategoriHvc = '';
    $hvcWaGroup = '';

    if ($request->all()) {
      $witel = $request->witel;
      $sto = $request->sto;
      $bulanAlert = $request->bulanAlert ? $request->bulanAlert : $this->currentYearMonth;
      $status = $request->status;
      $kategoriHvc = $request->kategoriHvc;
      $hvcWaGroup = $request->hvcWaGroup;
      $newestBulanAlert = $bulanAlert;
      $newestBulanAlertYear = substr($newestBulanAlert, 0, 4);
      $newestBulanAlertMonth = substr($newestBulanAlert, -2);

      $filteredData->when($witel, function ($query) use ($witel) {
        return $query->where('WITEL', $witel);
      })->when($sto, function ($query) use ($sto) {
        return $query->where('STO', $sto);
      })->when($status, function ($query) use ($status) {
        return $query->where('STATUS', $status);
      })->when($kategoriHvc, function ($query) use ($kategoriHvc) {
        return $query->where('ATRIBUT', $kategoriHvc);
      })->when($hvcWaGroup, function ($query) use ($hvcWaGroup) {
        return $query->where('HVC_WA_GROUP', $hvcWaGroup);
      })->where('BULAN_ALERT', $bulanAlert);
    } else {
      $filteredData->where('BULAN_ALERT', $this->currentYearMonth);
    }

    if (config('querylimit.alert.update.isLimit')) {
      $filteredData->limit(config('querylimit.alert.update.isLimit'));
    }

    $filteredData = $filteredData->get();

    return view(
      'alert.view_update',
      compact(
        'filteredData',
        'witel',
        'sto',
        'bulanAlert',
        'status',
        'kategoriHvc',
        'hvcWaGroup',
        'distinctWitel',
        'distinctSto',
        'distinctBulanAlert',
        'distinctStatus',
        'distinctKategoriHvc',
        'distinctHvcWaGroup',
      )
    );
  }
}
