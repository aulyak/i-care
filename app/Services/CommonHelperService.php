<?php

namespace App\Services;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CommonHelperService
{
    public $model;
    public $prefixCache;
    public $cacheTime = 3000; // Cache for 1 day (24 * 60 hour)
    public $request;
    function __construct($model, $cacheTime = (24 * 60), $request)
    {
        $this->model = app("App\\Models\\" . $model);
        $this->prefixCache = $model;
        $this->request = $request;
        // $this->cacheTime = $cacheTime;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function keyToTitle($key)
    {
        return ucwords(str_replace('_', ' ', strtolower($key)));
    }
    public function getDistinct($key, $asArray = false)
    {
        $result =  Cache::remember($this->prefixCache . '_DISTINCT_KEY_' . $key, now()->addMinutes($this->cacheTime), function () use ($key) {
            return $this->model::distinct()->get($key);
        });
        if ($asArray) {
            $tmpArr = array();
            foreach ($result as $res) {
                if ($res[$key] != null & $res[$key] != '' & $res[$key] != $key) array_push($tmpArr, $res[$key]);
            }
            return $tmpArr;
        } else {
            return $result;
        }
    }
    private function getDefaultValue($key)
    {
        $val = $this->request->query($key);
        if (isset($val)) {
            return $val;
        } else {
            return 'All';
        }
    }
    private function fetchOption($key)
    {
        $data['LABEL'] = $this->keyToTitle($key);
        $data['KEY'] = $key;
        $data['VALUE'] = $this->getDefaultValue($key);
        $defaultData = array('All');
        $distictRes = $this->getDistinct($key, true);
        $data['DATA'] = array_merge($defaultData, $distictRes);
        return $data;
    }

    public function buildTableData($column, $row)
    {
        $res = array();
        $colDistinct = $this->getDistinct($column, true);
        $res['HEAD'] = array_merge(array($row), $colDistinct);
        $res['ROW'] = array();
        foreach ($colDistinct as $col) {
            $data = Cache::remember($this->model . '_' . $column . '_TABLE_' . $col . 'DATA_' . $this->hasQuery(), $this->cacheTime, function () use ($column, $col, $row) {
                // $query = $this->getModel()::select(DB::raw('count(*) as tbl_ct'));
                // $query->where($column, $col);
                // $this->proceedFilter($query);
                // return $query->groupBy($row)->pluck('tbl_ct')->toArray();
            });
            $query = $this->getModel()::select('WITEL', DB::raw('count(*) as tbl_ct'));
            $query->where($column, $col);
            $this->proceedFilter($query);
            $rdata = $query->groupBy($row)->pluck('WITEL', 'tbl_ct');
            foreach ($rdata as $rdkey => $rdval) {
                if (!isset($res['ROW'][$rdval])) $res['ROW'][$rdval] = array();
                if ($rdkey == 0) $rdkey = '-';
                array_push($res['ROW'][$rdval], $rdkey);
            }
        }
        // dd($res['ROW']);
        return $res;
    }

    public function buildChartData($column, $asPercentage = false)
    {
        $res = array();
        $res['LABEL'] = $this->getDistinct($column, true);
        $res['DATA'] = array();
        $totalData = 0;
        foreach ($res['LABEL'] as $label) {
            $data = Cache::remember($this->model . '_CHART_' . $label . 'COUNT_' . $this->hasQuery(), $this->cacheTime, function () use ($column, $label) {
                $query = $this->getModel()::select(DB::raw('count(*) as dt'));
                $query->where($column, $label);
                $this->proceedFilter($query);
                return $query->pluck('dt')[0];
            });
            $totalData += $data;
            array_push($res['DATA'], $data);
        }
        if ($asPercentage) {
            foreach ($res['DATA'] as $data) {
                $data = ($data / $totalData) * 100;
            }
        }
        return $res;
    }

    public function buildOptions($options)
    {
        $result = array();
        foreach ($options as $option) {
            $result[$option] = $this->fetchOption($option);
        }
        return $result;
    }

    public function transformNumber($num = NULL, $maxrand = 999999, $formatted = true)
    {
        $val = (isset($num) ? $num : rand(0, $maxrand));
        if (!$formatted) return $val;
        return number_format($val, 0, '.', ',');
    }

    public function hasQuery()
    {
        $queryStr = '';
        if (isset($this->request->server()['QUERY_STRING'])) {
            $conds = $this->request->query();
            foreach ($conds as $key => $value) {
                if ($value != 'All') {
                    $queryStr .= $key . '-' . $value . '_';
                }
            }
        }
        return $queryStr;
    }
    public function proceedFilter($query)
    {
        if ($this->hasQuery() == '') return $query;
        $conds = $this->request->query();
        foreach ($conds as $key => $value) {
            if ($value != 'All') {
                $query = $query->where($key, $value);
            }
        }
        return $query;
    }
}
