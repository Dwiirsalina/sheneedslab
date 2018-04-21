<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RequestForm;

class AdminController extends Controller
{
    public function getHistoryAdminDashboard(Request $req)
    {
      try {
        $requests = RequestForm::paginate(15);
      } catch (Exception $e) {
        return json_encode([
          'status' => 500,
          'error' => $e
        ]);
      }
       $data['requests'] = $requests;
       // dd($requests);
      return view('admin.dashboard',$data);
    }
}