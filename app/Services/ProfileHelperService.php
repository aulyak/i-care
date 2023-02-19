<?php

namespace App\Services;


class ProfileHelperService
{
  public $table;
  function __construct($table)
  {
    $this->table = $table;
  }
  private function keyToTitle($key)
  {
    return ucwords(str_replace('_', ' ', strtolower($key)));
  }
  private function transformNumber($num = null, $maxrand = 999999, $formatted = true)
  {
    $val = ($num == null ? rand(0, $maxrand) : $num);
    if (!$formatted) return $val;
    return number_format($val, 0, '.', ',');
  }
  private function buildDummyData($count, $maxrand = 60000, $formatted = true)
  {
    $dummyData = array();
    for ($i = 0; $i < $count; $i++) {
      array_push($dummyData, $this->transformNumber(null, $maxrand, $formatted));
    }
    return $dummyData;
  }
  private function fetchOption($key)
  {
    $data['LABEL'] = $this->keyToTitle($key); // default label
    $defaultData = array('All'); // initial option to all
    $dummyData = array('OPTION1', 'OPTION2');
    if ($key == 'WITEL') {
      $witels = array('WITEL1', 'WITEL2', 'WITEL3', 'WITEL4');
      $data['DATA'] = array_merge($defaultData, $witels);
    } else {
      $dummyData = array();
      for ($i = 1; $i < rand(2, 10); $i++) {
        array_push($dummyData, 'DUMMY ' . $key . ' ' . $i);
      }
      $data['DATA'] = array_merge($defaultData, $dummyData);
    }
    return $data;
  }

  public function buildOption($options)
  {
    $data = null;
    foreach ($options as $option) {
      $data[$option] = $this->fetchOption($option);
    }
    return $data;
  }
  public function buildOverview($options)
  {
    $data = null;
    foreach ($options as $option) {
      $data[$option] = $this->transformNumber();
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
      return app()->chartjs
        ->name($key)
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['1P-INTERNET (INTERNET)', '2P (POTS-INTERNET)', '2P-BRITE', '2P-GAMER', '2P-HOMEWIFI', '2P-LITE', '2P-NETIZEN (POTS-INTERNET)', '2P-PREPAID', '3P (POTS-INTERNET-IPTV)'])
        ->datasets([
          ['data' => $this->buildDummyData(9, 100)],
        ])
        ->options(array_merge($defaultOptions, $defaultNoGrid, $defaultNoLegend, [
          'indexAxis' => 'y'
        ]));
    } elseif ($key == 'PROPORSI_PRODUCT') {
      return app()->chartjs
        ->name($key)
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['1P INET', '2P (POTS-INET)', '3P', 'HOMEWIFI'])
        ->datasets([
          [
            'data' => [rand(0, 700), rand(0, 700), rand(0, 700), rand(0, 700)],
            'backgroundColor' => ['#d2691e', '#28a745', '#007bff', '#dc3545'],
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
      return app()->chartjs
        ->name($key)
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['>=700K', '500K-700K', '300K-500K', '<300K'])
        ->datasets([
          ['data' => $this->buildDummyData(4, 120000, false)],
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
      return app()->chartjs
        ->name($key)
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['2X-5X', '5X-10X', '<2X', '>=10X', 'NO TICKET'])
        ->datasets([
          ['data' => $this->buildDummyData(5, 600000, false)],
        ])
        ->options(array_merge(
          $defaultOptions,
          $defaultNoGrid,
          $defaultNoLegend,
          [
            'indexAxis' => 'y'
          ]
        ));
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
      $tbl['HEAD'] = array('', '1P-INTERNET (INTERNET)', '2P (POTS-INTERNET)', '2P-BRITE', '2P-GAMER', '2P-HOMEWIFI', '2P-LITE', '2P-NETIZEN (POTS-INTERNET)', '2P-PREPAID', '3P (POTS-INTERNET-IPTV)');
      $tbl['ROW'] = array(
        array_merge(array('JAKBAR'), $this->buildDummyData(9)),
        array_merge(array('JAKPUS'), $this->buildDummyData(9)),
        array_merge(array('JAKSEL'), $this->buildDummyData(9))
      );
    } elseif ($key == 'ARPU_X_SPEED') {
      $tbl['HEAD'] = array('', '300K-500K', '500K-700K', '< 300K', '>= 700K');
      $tbl['ROW'] = array(
        array_merge($this->buildDummyData(5)),
        array_merge($this->buildDummyData(5)),
        array_merge($this->buildDummyData(5))
      );
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
}
