<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\dataImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
  //

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index(Request $request)
  {

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

    $yearList = [
      2019,
      2020,
      2021,
      2022,
      2023
    ];

    $witel = null;
    $month = null;
    $year = null;
    $distinct = null;
    $totalSales = 0;
    $totalLis = 0;
    $totalLoss = 0;
    $totalVha = 0;
    $filteredProporsi = null;
    $summary = Excel::toArray(new dataImport, 'storage/Summary.csv');
    $dataSummary = collect($summary[0]);
    $profileLoss = Excel::toArray(new dataImport, 'storage/Profile Loss.csv');
    $dataProfileLoss = collect($profileLoss[0]);
    $alert = Excel::toArray(new dataImport, 'storage/Alert.csv');
    $dataAlert = collect($alert[0]);
    $filteredSummary = $dataSummary;
    $filteredProfileLoss = $dataProfileLoss;
    $filteredAlert = $dataAlert;
    $filteredDataAlertVh = null;

    $map = $dataSummary->map(function ($row) {
      return $row['witel'];
    });
    $distinct = $map->unique();

    if ($request->all()) {
      $witel = $request->witel;
      $month = $request->month;
      $year = $request->year;
      $monthIndex = array_search($month, $monthList) + 1;
      $filterMonth = str_pad($monthIndex, 2, '0', STR_PAD_LEFT);
      $filterMonthYear = $year . $filterMonth;

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
          $yearRow = substr($monthYearRow, 3);
          return $row['bulan'] == $filterMonthYear;
        });

        $filteredProfileLoss = $dataProfileLoss->filter(function ($row) use ($filterMonthYear) {
          $monthYearRow = (string) $row['bulan'];
          $yearRow = substr($monthYearRow, 3);
          return $row['bulan'] == $filterMonthYear;
        });

        $filteredAlert = $dataAlert->filter(function ($row) use ($filterMonthYear) {
          return $row['bulan_alert'] == $filterMonthYear;
        });
      } else if (!$witel && !$month && $year) {
        $filteredSummary = $dataSummary->filter(function ($row) use ($year) {
          $monthYearRow = (string) $row['bulan'];
          $yearRow = substr($monthYearRow, 3);
          return $yearRow == $year;
        });

        $filteredProfileLoss = $dataProfileLoss->filter(function ($row) use ($year) {
          $monthYearRow = (string) $row['bulan'];
          $yearRow = substr($monthYearRow, 3);
          return $yearRow == $year;
        });

        $filteredAlert = $dataAlert->filter(function ($row) use ($year) {
          $monthYearRow = (string) $row['bulan_alert'];
          $yearRow = substr($monthYearRow, 3);
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
      }

      $filteredDataAlertVh = $filteredAlert->filter(function ($row) {
        return $row['alert'] === 'VERY HIGH ALERT';
      });

      $totalSales = $filteredSummary->reduce(function ($carry, $item) {
        return $carry + $item['total_sales'];
      });
      $totalLis = $filteredSummary->reduce(function ($carry, $item) {
        return $carry + $item['total_lis'];
      });
      $totalLoss = $filteredProfileLoss->reduce(function ($carry, $item) {
        return $carry + $item['jumlah'];
      });
      $totalVha = $filteredDataAlertVh->reduce(function ($carry) {
        return $carry + 1;
      });
    }

    return view(
      'dashboard',
      compact(
        'witel',
        'month',
        'year',
        'distinct',
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