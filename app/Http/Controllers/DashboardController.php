<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Summary;
use App\Models\Alert;
use App\Models\Witel;
use App\Models\ProfileLoss;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  //
  private $QUERY_LIMIT = 10000;
  private $LIMMIT_ACTIVE = true;

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index(Request $request)
  {
    $currentDate = Carbon::now();
    $currentYear = $currentDate->year;
    $currentMonth = str_pad($currentDate->month, 2, '0', STR_PAD_LEFT);

    $oldestYearMonth = Summary::orderBy('BULAN', 'ASC')->limit(1)->first(['BULAN'])->BULAN;
    $oldestYear = (int) substr($oldestYearMonth, 0, 4);

    $monthList = [
      'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember',
    ];

    $startYear = $oldestYear;
    while ($startYear != $currentYear + 1) {
      $yearList[] = $startYear;
      $startYear++;
    }

    $witel = null;
    $month = null;
    $year = null;
    $distinctWitel = null;
    $totalSales = 0;
    $totalLis = 0;
    $totalLoss = 0;
    $totalVha = 0;
    $filteredProporsi = null;
    $filteredDataAlertVh = null;
    $filteredAlert = null;

    $distinctWitel = Witel::select('WITEL')->groupBy('WITEL')->cursor()->pluck('WITEL');

    if ($request->all()) {
      $witel = $request->witel;
      $month = $request->month;
      $year = $request->year;
      $monthIndex = array_search($month, $monthList) + 1;
      $filterMonth = str_pad($monthIndex, 2, '0', STR_PAD_LEFT);
      $filterMonthYear = $year . $filterMonth;
      $filterYear = $year;

      $filteredSummary = Summary::when($witel, function ($query) use ($witel) {
        return $query->where('WITEL', $witel);
      })->when($year && $month, function ($query) use ($filterMonthYear) {
        return $query->where('BULAN', $filterMonthYear);
      })->when($month && !$year, function ($query) use ($filterMonth) {
        return $query->where(DB::raw('substr(BULAN, 5, 2)'), '=', $filterMonth);
      })->when($year && !$month, function ($query) use ($filterYear) {
        return $query->where(DB::raw('substr(BULAN, 1, 4)'), '=', $filterYear);
      });

      $filteredAlert = Alert::when($witel, function ($query) use ($witel) {
        return $query->where('WITEL', $witel);
      })->when($year && $month, function ($query) use ($filterMonthYear) {
        return $query->where('BULAN_ALERT', $filterMonthYear);
      })->when($month && !$year, function ($query) use ($filterMonth) {
        return $query->where(DB::raw('substr(BULAN_ALERT, 5, 2)'), '=', $filterMonth);
      })->when($year && !$month, function ($query) use ($filterYear) {
        return $query->where(DB::raw('substr(BULAN_ALERT, 1, 4)'), '=', $filterYear);
      });

      $filteredProfileLoss = ProfileLoss::when($witel, function ($query) use ($witel) {
        return $query->where('WITEL', $witel);
      })->when($year && $month, function ($query) use ($filterMonthYear) {
        return $query->where('BULAN', $filterMonthYear);
      })->when($month && !$year, function ($query) use ($filterMonth) {
        return $query->where(DB::raw('substr(BULAN, 5, 2)'), '=', $filterMonth);
      })->when($year && !$month, function ($query) use ($filterYear) {
        return $query->where(DB::raw('substr(BULAN, 1, 4)'), '=', $filterYear);
      });
    } else {
      $filteredSummary = Summary::where(DB::raw('substr(BULAN, 1, 4)'), '=', $currentYear);
      $filteredAlert = Alert::where(DB::raw('substr(BULAN_ALERT, 1, 4)'), '=', $currentYear);
      $filteredProfileLoss = ProfileLoss::where(DB::raw('substr(BULAN, 1, 4)'), '=', $currentYear);
    }

    // limit testing
    if ($this->LIMMIT_ACTIVE) {
      $filteredSummary = $filteredSummary->limit($this->QUERY_LIMIT);
      $filteredProfileLoss = $filteredProfileLoss->limit($this->QUERY_LIMIT);
      $filteredAlert = $filteredAlert->limit($this->QUERY_LIMIT);
    }

    $filteredAlert = $filteredAlert->where('ALERT', 'VERY HIGH ALERT');
    $totalSales = $filteredSummary->sum('TOTAL_SALES');
    $totalLis = $filteredSummary->sum('TOTAL_LIS');
    $totalLoss = $filteredProfileLoss->sum('JUMLAH');

    $filteredSummary = $filteredSummary->cursor();
    $filteredProfileLoss = $filteredProfileLoss->cursor();


    // slowing query alert
    $filteredDataAlertVh = $filteredAlert->cursor();
    $totalVha = $filteredAlert->count();

    return view(
      'dashboard',
      compact(
        'witel',
        'month',
        'year',
        'distinctWitel',
        'monthList',
        'totalSales',
        'totalLis',
        'totalLoss',
        'totalVha',
        'filteredSummary',
        'filteredProfileLoss',
        'filteredAlert',
        'filteredDataAlertVh',
        'yearList'
      )
    );
  }
}
