<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\dataImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;
use App\Services\CsvService;
use Carbon\Carbon;

class ProfileController extends Controller
{
  public function profileLeveraging(Request $request)
  {
    return view('profile.leveraging');
  }

  public function profileRetention(Request $request)
  {
    return view('profile.retention');
  }

  public function profileListKwadran(Request $request)
  {
    return view('profile.list_kwadran');
  }

  public function profileChurn(Request $request)
  {
    return view('profile.churn_to_sales');
  }
}