<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\dataImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;

class AlertViewUpdateController extends Controller
{
  //

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index(Request $request)
  {
      return view('alert_view_update');
  }
}