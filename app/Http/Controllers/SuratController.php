<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Status;
use App\Model\Lodger;
use App\Model\RequestForm;
use PDF;

class SuratController extends Controller
{
    public function cetak($id){
        $request = RequestForm::where([['id', '=', $id], ['status', '=', '10']])->first();
        dd($request);
        if(count($request) != 0){
            $data['lodgers'] = Lodger::where('request_id', $id)->with('user')->get();
            
            if(count($data['lodgers']) != 0){
                $pdf = PDF::loadView('user.surat', $data);
                $pdf->setPaper('A4', 'potrait');
                $name = "Surat izin" . ".pdf";
                return $pdf->stream($name);
            }
            else {
                $data['lodgers'] = null;
                return 404;
            }       
        }
    }
}
