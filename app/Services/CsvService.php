<?php

namespace App\Services;

use App\Imports\dataImport;
use Maatwebsite\Excel\Facades\Excel;

class CsvService
{
  public function readCsv($path)
  {
    $data = Excel::toArray(new dataImport, $path);
    $collectedData = collect($data[0]);

    return $collectedData;
  }

  public function getUniqueByRowName($data, $rowName)
  {
    $mappedData = $data->map(function ($row) use ($rowName) {
      if ($rowName === "status" || $rowName === "hvc_wa_group") return trim($row[$rowName]);

      return $row[$rowName];
    });

    if ($rowName === "hvc_wa_group") $mappedData = $mappedData->filter(function ($row) {
      return $row !== "";
    });

    $distinctData = $mappedData->unique();

    return $distinctData;
  }
}