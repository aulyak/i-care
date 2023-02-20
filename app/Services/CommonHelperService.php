<?php

namespace App\Services;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Cache;

class CommonHelperService
{
    public $model;
    public $prefixCache;
    public $cacheTime = 1440; // Cache for 1 day (24 * 60 hour)
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
