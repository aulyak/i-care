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
        if (is_array($column)) {
            $res['HEAD'] = array();
            $colDistinct = array();
            foreach ($column as $colval) {
                array_push($res['HEAD'], $colval['title']);
                if (isset($colval['whereRaw'])) array_push($colDistinct, $colval);
            }
        } else {
            $colDistinct = $this->getDistinct($column, true);
            $res['HEAD'] = array_merge(array($row), $colDistinct);
        }
        $rowDistinct = $this->getDistinct($row, true);
        $res['ROW'] = array();
        foreach ($rowDistinct as $rd) {
            array_push($res['ROW'], array($rd));
        }
        foreach ($colDistinct as $col) {
            // if ($row == 'SPEED') dd($res, $colDistinct, $col);
            $data = Cache::remember($this->model . '_' . (is_array($column) ? $column[0]['title'] : $column) . '_TABLE_' . (is_array($col) ? $col['title'] : $col) . 'DATA_' . $this->hasQuery(), $this->cacheTime, function () use ($column, $col, $row) {
                $query = $this->model::select($row, DB::raw('count(*) as tbl_ct'));
                if (is_array($col)) {
                    $query->whereRaw($col['whereRaw']);
                } else {
                    $query->where($column, $col);
                }
                $this->proceedFilter($query);
                $rdata = $query->groupBy($row)->pluck($row, 'tbl_ct')->toArray();
                return array_flip($rdata);
            });
            foreach ($res['ROW'] as &$rd) {
                if (isset($data[$rd[0]])) {
                    array_push($rd, $data[$rd[0]]);
                } else {
                    array_push($rd, "-");
                }
            }
        }
        // if ($row == 'SPEED') dd($res, $colDistinct, $col, $data);
        return $res;
    }

    public function buildChartData($column, $asPercentage = false, $stack = null)
    {
        $res = array();
        $res['LABEL'] = $this->getDistinct($column, true);
        $res['DATA'] = array();
        $totalData = 0;
        foreach ($res['LABEL'] as $label) {
            $data = Cache::remember($this->model . '_CHART_' . $label . 'COUNT_' . $this->hasQuery(), $this->cacheTime, function () use ($column, $label) {
                $query = $this->model::select(DB::raw('count(*) as dt'));
                $query->where($column, $label);
                $this->proceedFilter($query);
                return $query->pluck('dt')[0];
            });
            $totalData += $data;
            array_push($res['DATA'], $data);
        }
        if ($asPercentage) {
            foreach ($res['DATA'] as $data) {
                if ($totalData == 0) {
                    $data = 0;
                } else {
                    $data = ($data / $totalData) * 100;
                }
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
