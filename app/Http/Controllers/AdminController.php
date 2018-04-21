<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RequestForm;

class AdminController extends Controller
{
    public function getHistoryAdminDashboard(Request $req)
    {
      try {
        $requests = RequestForm::where('status',2)->with('people')->orderBy('created_at')->paginate(15);
      } catch (Exception $e) {
        return json_encode([
          'status' => 500,
          'error' => $e
        ]);
      }
       $data['requests'] = $requests;
      return view('admin.history',$data);
    }
}