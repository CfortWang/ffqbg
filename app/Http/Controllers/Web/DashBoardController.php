<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Validator;

class DashBoardController extends Controller
{
  public function __construct()
  {
    $this->title = 'DashBoard';
  }

  public function index()
  {
    return view('web.contents.dashboard.dashboard');
  }
  // public function getDash(){
  //     $result = DB::table('dash')->get();
  //     return $result;
  // }
}
