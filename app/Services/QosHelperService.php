<?php

namespace App\Services;

use App\Models\QOS;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Services\CommonHelperService;
use Barryvdh\Debugbar\Facades\Debugbar;

class QosHelperService
{
    public $chs;
    public $request;
    function __construct($model, $cacheTime = (24 * 60), $request)
    {
        $this->chs = new CommonHelperService($model, $cacheTime, $request);
        $this->request = $request;
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
    public function buildOptions($options)
    {
        return $this->chs->buildOptions($options);
    }

    public function buildQuery($groupKey = 'BULAN_SALES')
    {
        $result = array();
        $groups = $this->chs->getDistinct($groupKey);
        foreach ($groups as $group) {
            $groupData = $group[$groupKey];
            if ($this->isValidGroupData($groupData, $groupKey)) {
                $rawdata['GROUP'] = $groupData;
                $rawdata['AGING_COUNT'] = Cache::remember('QHS_AGING_COUNT_' . $rawdata['GROUP'] . $this->chs->hasQuery(), now()->addMinutes(120), function () use ($groupData, $groupKey) {
                    $query = QOS::select(DB::raw('count(*) as total_aging'))
                        ->where($groupKey, '=', $groupData);
                    $this->chs->proceedFilter($query);
                    return $query
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
