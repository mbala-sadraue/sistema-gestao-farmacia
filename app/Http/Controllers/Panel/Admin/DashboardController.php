<?php

namespace App\Http\Controllers\Panel\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index(){
    try {

        return view('panel.admin.dashboard.dashboard');

    } catch (Exception $th) {
       echo $th->getMessage();
    }
   }
}
