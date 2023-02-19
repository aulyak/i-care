<?php

namespace App\Services;

use App\Models\QOS;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class QosHelperService
{
    private function keyToTitle($key)
    {
        return ucwords(str_replace('_', ' ', strtolower($key)));
    }
    public function getDistinct($key, $asArray = false)
    {
        $result =  Cache::remember('QHS_DISTINCT_KEY_' . $key, now()->addMinutes(120), function () use ($key) {
            return QOS::distinct()->get($key);
        });
        if ($asArray) {
            $tmpArr = array();
            foreach ($result as $res) {
                array_push($tmpArr, $res[$key]);
            }
            return $tmpArr;
        } else {
            return $result;
        }
    }

    public function getAgingQuery()
    {
        return [0, 1, 6, 7, 8, 12, 13, 14, 18];
    }
    private function isValidGroupData($groupData, $groupKey)
    {
        if ($groupData == null) return false;
        if ($groupKey == 'BULAN_SALES') {
            if (str_starts_with($groupData, '20')) {
                return true;
            } else {
                return false;
            }
        } elseif ($groupKey == 'WITEL') {
            if ($groupData == 'WITEL') {
                return false;
            } else {
                return true;
            }
        }
        return true;
    }
    private function fetchOption($key)
    {
        $data['LABEL'] = $this->keyToTitle($key);
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
    public function buildQuery($groupKey = 'BULAN_SALES')
    {
        $result = array();
        $groups = $this->getDistinct($groupKey);
        foreach ($groups as $group) {
            $groupData = $group[$groupKey];
            if ($this->isValidGroupData($groupData, $groupKey)) {
                $rawdata['GROUP'] = $groupData;
                $rawdata['AGING_COUNT'] = Cache::remember('QHS_AGING_COUNT_' . $rawdata['GROUP'], now()->addMinutes(120), function () use ($groupData, $groupKey) {
                    return QOS::select(DB::raw('count(*) as total_aging'))
                        ->where($groupKey, '=', $groupData)
                        ->groupBy('AGING')
                        ->pluck('total_aging')->toArray();
                });
                $rawdata['AGING_PERCENTAGE'] = array();
                for ($y = 1; $y <= count($rawdata['AGING_COUNT']); $y++) {
                    $agingPercentage = ($rawdata['AGING_COUNT'][$y - 1] / $rawdata['AGING_COUNT'][0]);
                    array_push($rawdata['AGING_PERCENTAGE'], $agingPercentage);
                }
                array_push($result, $rawdata);
            }
        }
        return $result;
    }
}
