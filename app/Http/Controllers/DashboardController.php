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

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index(Request $request)
  {
    // dump('hai');
    // $data = Summary::get();
    $currentDate = Carbon::now();
    $currentYear = $currentDate->year;
    $currentMonth = str_pad($currentDate->month, 2, '0', STR_PAD_LEFT);

    $oldestYearMonth = Summary::orderBy('BULAN', 'ASC')->limit(1)->first(['BULAN'])->BULAN;
    // dump($oldestYearMonth);
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
    // $modelCollect = collect($data);
    // $dataSummary = $csvService->readCsv('storage/Summary.csv');
    // $dataSummary = $modelCollect;

    // $dataProfileLoss = $csvService->readCsv('storage/Profile Loss.csv');
    // $dataAlert = $csvService->readCsv('storage/Alert.csv');
    // $filteredSummary = $dataSummary;
    // $filteredProfileLoss = $dataProfileLoss;
    // $filteredAlert = $dataAlert;

    // $mappedWitel = $dataSummary->map(function ($row) {
    //   return $row['witel'];
    // });
    // $distinctWitel = $mappedWitel->unique();
    $distinctWitel = Witel::select('WITEL')->groupBy('WITEL')->cursor()->pluck('WITEL');
    // dump(Witel::select('WITEL')->groupBy('WITEL')->toSql());
    // dump($distinctWitel);
    // $distinctWitel = $csvService->getUniqueByRowName($dataSummary, 'WITEL');


    if ($request->all()) {
      $witel = $request->witel;
      $month = $request->month;
      $year = $request->year;
      $monthIndex = array_search($month, $monthList) + 1;
      $filterMonth = str_pad($monthIndex, 2, '0', STR_PAD_LEFT);
      $filterMonthYear = $year . $filterMonth;
      $filterYear = $year;

      // dump($request->all());

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

      /* 
      if ($witel && $month && $year) {
        $filteredSummary = $dataSummary->filter(function ($row) use ($witel, $filterMonthYear) {
          return $row['witel'] === $witel && $row['bulan'] == $filterMonthYear;
        });

        $filteredProfileLoss = $dataProfileLoss->filter(function ($row) use ($witel, $filterMonthYear) {
          return $row['witel'] === $witel && $row['bulan'] == $filterMonthYear;
        });

        $filteredAlert = $dataAlert->filter(function ($row) use ($witel, $filterMonthYear) {
          return $row['witel'] === $witel && $row['bulan_alert'] == $filterMonthYear;
        });
      } else if (!$witel && $month && $year) {
        $filteredSummary = $dataSummary->filter(function ($row) use ($filterMonthYear) {
          $monthYearRow = (string) $row['bulan'];
          $yearRow = substr($monthYearRow, 0, 4);
          return $row['bulan'] == $filterMonthYear;
        });

        $filteredProfileLoss = $dataProfileLoss->filter(function ($row) use ($filterMonthYear) {
          $monthYearRow = (string) $row['bulan'];
          $yearRow = substr($monthYearRow, 0, 4);
          return $row['bulan'] == $filterMonthYear;
        });

        $filteredAlert = $dataAlert->filter(function ($row) use ($filterMonthYear) {
          return $row['bulan_alert'] == $filterMonthYear;
        });
      } else if (!$witel && !$month && $year) {
        $filteredSummary = $dataSummary->filter(function ($row) use ($year) {
          $monthYearRow = (string) $row['bulan'];
          $yearRow = substr($monthYearRow, 0, 4);
          return $yearRow == $year;
        });

        $filteredProfileLoss = $dataProfileLoss->filter(function ($row) use ($year) {
          $monthYearRow = (string) $row['bulan'];
          $yearRow = substr($monthYearRow, 0, 4);
          return $yearRow == $year;
        });

        $filteredAlert = $dataAlert->filter(function ($row) use ($year) {
          $monthYearRow = (string) $row['bulan_alert'];
          $yearRow = substr($monthYearRow, 0, 4);
          return $yearRow == $year;
        });
      } else if ($witel && $month && !$year) {
        $filteredSummary = $dataSummary->filter(function ($row) use ($witel, $filterMonth) {
          $monthYearRow = (string) $row['bulan'];
          $monthRow = substr($monthYearRow, -2);
          return $row['witel'] === $witel && $monthRow == $filterMonth;
        });

        $filteredProfileLoss = $dataProfileLoss->filter(function ($row) use ($witel, $filterMonth) {
          $monthYearRow = (string) $row['bulan'];
          $monthRow = substr($monthYearRow, -2);
          return $row['witel'] === $witel && $monthRow == $filterMonth;
        });

        $filteredAlert = $dataAlert->filter(function ($row) use ($witel, $filterMonth) {
          $monthYearRow = (string) $row['bulan_alert'];
          $monthRow = substr($monthYearRow, -2);
          return $row['witel'] === $witel && $monthRow == $filterMonth;
        });
      } else if ($witel && !$month && $year) {
        $filteredSummary = $dataSummary->filter(function ($row) use ($witel, $year) {
          $monthYearRow = (string) $row['bulan'];
          $yearRow = substr($monthYearRow, 0, 4);
          return $row['witel'] === $witel && $yearRow == $year;
        });

        $filteredProfileLoss = $dataProfileLoss->filter(function ($row) use ($witel, $year) {
          $monthYearRow = (string) $row['bulan'];
          $yearRow = substr($monthYearRow, 0, 4);
          return $row['witel'] === $witel && $yearRow == $year;
        });

        $filteredAlert = $dataAlert->filter(function ($row) use ($witel, $year) {
          $monthYearRow = (string) $row['bulan_alert'];
          $yearRow = substr($monthYearRow, 0, 4);
          return $row['witel'] === $witel && $yearRow == $year;
        });
      } else if ($witel && !$month && !$year) {
        $filteredSummary = $dataSummary->filter(function ($row) use ($witel) {
          return $row['witel'] === $witel;
        });

        $filteredProfileLoss = $dataProfileLoss->filter(function ($row) use ($witel) {
          return $row['witel'] === $witel;
        });

        $filteredAlert = $dataAlert->filter(function ($row) use ($witel) {
          return $row['witel'] === $witel;
        });
      } else if (!$witel && $month && !$year) {
        $filteredSummary = $dataSummary->filter(function ($row) use ($filterMonth) {
          $monthYearRow = (string) $row['bulan'];
          $monthRow = substr($monthYearRow, -2);
          return $monthRow == $filterMonth;
        });

        $filteredProfileLoss = $dataProfileLoss->filter(function ($row) use ($filterMonth) {
          $monthYearRow = (string) $row['bulan'];
          $monthRow = substr($monthYearRow, -2);
          return $monthRow == $filterMonth;
        });

        $filteredAlert = $dataAlert->filter(function ($row) use ($filterMonth) {
          $monthYearRow = (string) $row['bulan_alert'];
          $monthRow = substr($monthYearRow, -2);
          return $monthRow == $filterMonth;
        });
      } else {
        $filteredSummary = $dataSummary;
        $filteredProfileLoss = $dataProfileLoss;
        $filteredAlert = $dataAlert;
      } 
      */
    } else {
      $filteredSummary = Summary::where(DB::raw('substr(BULAN, 1, 4)'), '=', $currentYear);
      $filteredAlert = Alert::where(DB::raw('substr(BULAN_ALERT, 1, 4)'), '=', $currentYear);
      $filteredProfileLoss = ProfileLoss::where(DB::raw('substr(BULAN, 1, 4)'), '=', $currentYear);
    }

    // limit testing
    $filteredSummary = $filteredSummary->limit($this->QUERY_LIMIT);
    $filteredProfileLoss = $filteredProfileLoss->limit($this->QUERY_LIMIT);
    $filteredAlert = $filteredAlert->limit($this->QUERY_LIMIT);

    // dump(
    //   $filteredSummary->get(),
    //   $filteredProfileLoss->get()
    // );

    $filteredAlert = $filteredAlert->where('ALERT', 'VERY HIGH ALERT');
    $totalSales = $filteredSummary->sum('TOTAL_SALES');
    $totalLis = $filteredSummary->sum('TOTAL_LIS');
    $totalLoss = $filteredProfileLoss->sum('JUMLAH');

    // dump($filteredSummary->toSql());
    // dump($filteredAlert->toSql());
    // dump($filteredProfileLoss->toSql());
    // dd();

    // dd(
    //   $totalSales,
    //   $totalLis,
    //   $totalLoss,
    // );

    $filteredSummary = $filteredSummary->cursor();
    $filteredProfileLoss = $filteredProfileLoss->cursor();


    // slowing query alert
    $filteredDataAlertVh = $filteredAlert->cursor();
    $totalVha = $filteredAlert->count();
    // dump(collect($filteredSummary), collect($filteredProfileLoss), collect($filteredDataAlertVh));

    // $filteredDataAlertVh = $filteredAlert->filter(function ($row) {
    //   return $row['alert'] === 'VERY HIGH ALERT';
    // });

    // $totalSales = $filteredSummary->reduce(function ($carry, $item) {
    //   return $carry + $item['total_sales'];
    // });
    // $totalLis = $filteredSummary->reduce(function ($carry, $item) {
    //   return $carry + $item['total_lis'];
    // });
    // $totalLoss = $filteredProfileLoss->reduce(function ($carry, $item) {
    //   return $carry + $item['jumlah'];
    // });
    // $totalVha = $filteredDataAlertVh->reduce(function ($carry) {
    //   return $carry + 1;
    // });

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
