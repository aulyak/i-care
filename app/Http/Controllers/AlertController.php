<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\dataImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;

class AlertController extends Controller
{
  public function viewByAge(Request $request)
  {
    return view('alert.view_by_age');
  }

  public function viewByWitel(Request $request)
  {
    return view('alert.view_by_witel');
  }

  public function viewUpdate(Request $request)
  {
    return view('alert.view_update');
  }
}