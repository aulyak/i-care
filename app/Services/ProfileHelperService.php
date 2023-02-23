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

  public function buildOption($options)
  {
    return $this->chs->buildOptions($options);
  }

  public function buildOverview($options)
  {
    $data = null;
    if ($this->model == "ProfileLeveraging") {
      $overviewCol = 'PRODUCT2';
    }
    if ($this->model == "ProfileRetention") {
      $overviewCol = 'KET_CT0';
    }
    $res = Cache::remember(
      $this->model . '_PHS_OVERVIEW_' . 'COUNT_' . $this->chs->hasQuery(),
      now()->addMinutes($this->chs->cacheTime),
      function () use ($overviewCol) {
        $query = $this->chs->model::select($overviewCol, DB::raw('count(*) as dt'))->groupBy($overviewCol);
        $this->chs->proceedFilter($query);
        return $query->get()->toArray();
      }
    );

    foreach ($options as $option) {
      $data[$option] = 0;
      foreach ($res as $r) {
        if ($this->model == "ProfileLeveraging" & $option != 'ALL_DATA') {
          if ($option == $r[$overviewCol]) $data[$option] = $r['dt'];
        }
        if ($this->model == "ProfileLeveraging" & $option == 'ALL_DATA') {
          $data['ALL_DATA'] += $r['dt'];
        }
        if ($this->model == "ProfileRetention" & $option != 'TOTAL_CT0') {
          if ($option == $r[$overviewCol]) $data[$option] = $r['dt'];
        }
        if ($this->model == "ProfileRetention" & $option == 'TOTAL_CT0') {
          $data['TOTAL_CT0'] += $r['dt'];
        }
      }
    }
    foreach ($data as &$dt) {
      $dt = $this->chs->transformNumber($dt);
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
      $chartData = $this->chs->buildStackChartData('USAGE', 'PRODUCT2');
      return app()->chartjs
        ->name($key)
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels($chartData['LABEL'])
        ->datasets($chartData['DATA'])
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
      $chartData = $this->chs->buildStackChartData('FUP', 'PRODUCT2');
      return app()->chartjs
        ->name($key)
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels($chartData['LABEL'])
        ->datasets($chartData['DATA'])
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
    } elseif ($key == 'CT0_PER_WITEL') {
      $chartData = $this->chs->buildStackChartData('WITEL', 'KET_CT0');
      return app()->chartjs
        ->name($key)
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels($chartData['LABEL'])
        ->datasets($chartData['DATA'])
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
    } elseif ($key == 'CT0_PER_SEGMEN') {
      $chartData = $this->chs->buildChartData('SEGMENT', true);
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
