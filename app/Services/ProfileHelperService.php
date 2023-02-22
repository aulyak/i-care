<?php

namespace App\Services;

use Barryvdh\Debugbar\Facades\Debugbar as FacadesDebugbar;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Process\Pool;

class ProfileHelperService
{
  public $chs;
  public $request;
  public $model;
  function __construct($model, $cacheTime, $request)
  {
    $this->chs = new CommonHelperService($model, $cacheTime, $request);
    $this->request = $request;
    $this->model = $model;
  }

  private function keyToTitle($key)
  {
    return ucwords(str_replace('_', ' ', strtolower($key)));
  }

  private function buildDummyData($count, $maxrand = 60000, $formatted = true)
  {
    $dummyData = array();
    for ($i = 0; $i < $count; $i++) {
      array_push($dummyData, $this->chs->transformNumber(null, $maxrand, $formatted));
    }
    return $dummyData;
  }

  public function buildOption($options)
  {
    return $this->chs->buildOptions($options);
  }

  public function buildOverview($options)
  {
    $data = null;
    foreach ($options as $option) {
      $res = Cache::remember($this->model . '_PHS_OVERVIEW_' . $option . 'COUNT_' . $this->chs->hasQuery(), $this->chs->cacheTime, function () use ($option) {
        $query = $this->chs->model::select(DB::raw('count(*) as dt'));
        if ($this->model == "ProfileLeveraging" & $option != 'ALL_DATA') {
          $query->where('PRODUCT2', $option);
        }
        if ($this->model == "ProfileRetention" & $option != 'TOTAL_CT0') {
          $query->where('KET_CT0', $option);
        }
        $this->chs->proceedFilter($query);
        return $query->pluck('dt')[0];
      });
      $data[$option] = $this->chs->transformNumber($res);
    }
    return $data;
  }

  private function makeChart($key)
  {
    $defaultOptions = [
      'responsive' => true,
      'maintainAspectRatio' =>  false,
      'datasetFill' =>  false,
    ];
    $defaultNoGrid = [
      'scales' => [
        'x' => [
          'grid' => [
            'display' => false,
          ]
        ],
        'y' => [
          'grid' => [
            'display' => false,
          ]
        ]
      ],
    ];
    $defaultNoLegend = [
      'plugins' => [
        'legend' => [
          'display' => false
        ]
      ]
    ];
    if ($key == 'PRODUCT_TYPE') {
      $chartData = $this->chs->buildChartData('PRODUCT');
      return app()->chartjs
        ->name($key)
        ->type('bar')
        ->size(['width' => 200, 'height' => 300])
        ->labels($chartData['LABEL'])
        ->datasets([
          ['data' => $chartData['DATA']],
        ])
        ->options(array_merge($defaultOptions, $defaultNoGrid, $defaultNoLegend, [
          'indexAxis' => 'y'
        ]));
    } elseif ($key == 'PROPORSI_PRODUCT') {
      $chartData = $this->chs->buildChartData('PRODUCT', true);
      return app()->chartjs
        ->name($key)
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels($chartData['LABEL'])
        ->datasets([
          [
            'data' => $chartData['DATA'],
          ]
        ])
        ->options($defaultOptions);
    } elseif ($key == 'USAGE') {
      return app()->chartjs
        ->name($key)
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['< 200GB', '200-350GB', '350-750GB', '>=750GB'])
        ->datasets([
          ['data' => $this->buildDummyData(4, 120000, false)],
          ['data' => $this->buildDummyData(4, 120000, false)],
          ['data' => $this->buildDummyData(4, 120000, false)],
          ['data' => $this->buildDummyData(4, 120000, false)]
        ])
        ->options(array_merge(
          $defaultOptions,
          $defaultNoGrid,
          $defaultNoLegend,
          [
            'x' => ['stacked' => true],
            'y' => ['stacked' => true],
            'indexAxis' => 'y'
          ]
        ));
    } elseif ($key == 'FUP') {
      return app()->chartjs
        ->name($key)
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['< FUP', '> FUP', 'NO FUP < 10MBPS'])
        ->datasets([
          ['data' => $this->buildDummyData(3, 120000, false)],
          ['data' => $this->buildDummyData(3, 120000, false)],
          ['data' => $this->buildDummyData(3, 120000, false)],
          ['data' => $this->buildDummyData(3, 120000, false)]
        ])
        ->options(array_merge(
          $defaultOptions,
          $defaultNoGrid,
          $defaultNoLegend,
          [
            'x' => ['stacked' => true],
            'y' => ['stacked' => true],
            'indexAxis' => 'y'
          ]
        ));
    } elseif ($key == 'KATEGORY_ARPU') {
      $chartData = $this->chs->buildChartData('KAT_ARPU');
      return app()->chartjs
        ->name($key)
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels($chartData['LABEL'])
        ->datasets([
          ['data' => $chartData['DATA']],
        ])
        ->options(array_merge(
          $defaultOptions,
          $defaultNoGrid,
          $defaultNoLegend,
          [
            'indexAxis' => 'y'
          ]
        ));
    } elseif ($key == 'JUMLAH_GANGGUAN') {
      $chartData = $this->chs->buildChartData('JML_GANGGUAN');
      return app()->chartjs
        ->name($key)
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels($chartData['LABEL'])
        ->datasets([
          ['data' => $chartData['DATA']],
        ])
        ->options(array_merge(
          $defaultOptions,
          $defaultNoGrid,
          $defaultNoLegend,
          [
            'indexAxis' => 'y'
          ]
        ));
    } elseif ($key == 'KETERANGAN_CT0') {
      $chartData = $this->chs->buildChartData('KET_CT0');
      return app()->chartjs
        ->name($key)
        ->type('bar')
        ->size(['width' => 200, 'height' => 300])
        ->labels($chartData['LABEL'])
        ->datasets([
          ['data' => $chartData['DATA']],
        ])
        ->options(array_merge($defaultOptions, $defaultNoGrid, $defaultNoLegend, [
          'indexAxis' => 'y'
        ]));
    } elseif ($key == 'PROPORSI_CT0') {
      $chartData = $this->chs->buildChartData('KET_CT0', true);
      return app()->chartjs
        ->name($key)
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels($chartData['LABEL'])
        ->datasets([
          [
            'data' => $chartData['DATA'],
          ]
        ])
        ->options($defaultOptions);
    } else {
      /* DUMMY DATA */
      return app()->chartjs
        ->name($key)
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Dummy Chart'])
        ->datasets([
          ['data' => [rand(0, 100)]],
          ['data' => [rand(0, 100)]]
        ])
        ->options(array_merge(
          $defaultOptions,
          $defaultNoGrid,
          $defaultNoLegend,
          [
            'x' => ['stacked' => true],
            'y' => ['stacked' => true],
            'indexAxis' => 'y'
          ]
        ));
    }
  }

  public function buildChart($options)
  {
    $data = null;
    foreach ($options as $option) {
      $data[$option] = $this->makeChart($option);
    }
    return $data;
  }

  private function tableBuilder($key)
  {
    $tbl['TITLE'] = $this->keyToTitle($key);
    $tbl['HEAD'] = array();
    $tbl['ROW'] = array();
    if ($key == 'PROUCT_TYPE_BY_WITEL') {
      $mtable = $this->chs->buildTableData('PRODUCT', 'WITEL');
      $tbl['HEAD'] = $mtable['HEAD'];
      $tbl['ROW'] = $mtable['ROW'];
    } elseif ($key == 'ARPU_X_SPEED') {
      $mtable = $this->chs->buildTableData('KAT_ARPU', 'SPEED');
      $tbl['HEAD'] = $mtable['HEAD'];
      $tbl['ROW'] = $mtable['ROW'];
    } elseif ($key == 'CT0_PER_UMUR_CT0') {
      $mtable = $this->chs->buildTableData(array(
        ['title' => 'LAMA_CT0'],
        ['title' => 'NEW CT0', 'whereRaw' => 'LAMA_CT0 = 0'],
        ['title' => '1-3 Bulan', 'whereRaw' => 'LAMA_CT0 >= 1 AND LAMA_CT0 < 3'],
        ['title' => '4-6 Bulan', 'whereRaw' => 'LAMA_CT0 >= 4 AND LAMA_CT0 < 6'],
        ['title' => '7-12 Bulan', 'whereRaw' => 'LAMA_CT0 >= 7 AND LAMA_CT0 < 13'],
        ['title' => '13-24 Bulan', 'whereRaw' => 'LAMA_CT0 >= 13 AND LAMA_CT0 < 24'],
        ['title' => '> 24 Bulan', 'whereRaw' => 'LAMA_CT0 >= 24'],
      ), 'WITEL');
      $tbl['HEAD'] = $mtable['HEAD'];
      $tbl['ROW'] = $mtable['ROW'];
    } elseif ($key == 'DETAIL_PER_WITEL') {
      $mtable = $this->chs->buildTableData('KET_CT0', 'WITEL');
      $tbl['HEAD'] = $mtable['HEAD'];
      $tbl['ROW'] = $mtable['ROW'];
    }
    return $tbl;
  }

  public function buildTable($options)
  {
    $data = null;
    foreach ($options as $option) {
      $data[$option] = $this->tableBuilder($option);
    }
    return $data;
  }
  public function buildTableCache($options)
  {
    $data = null;
    foreach ($options as $option) {
      $data[$option] = $this->tableBuilder($option);
    }
    return $data;
  }
}
