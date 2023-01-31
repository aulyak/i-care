<?php

namespace App\Actions;

class ProcessData
{
  public function filter($witel, $sto, $bulanAlert, $status, $kategoriHvc, $hvcWaGroup, $alertData)
  {
    $arrRequestMapCsv = [
      'witel' => $witel,
      'sto' => $sto,
      'bulan_alert' => $bulanAlert,
      'status' => $status,
      'atribut' => $kategoriHvc,
      'hvc_wa_group' => $hvcWaGroup,
    ];

    $filteredData = $alertData;
    foreach ($arrRequestMapCsv as $key => $value) {
      if ($value) {
        $filteredData = $filteredData->filter(function ($row) use ($key, $value) {
          return $row[$key] == $value;
        });
      }
    }

    return $filteredData;
  }
}