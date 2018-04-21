<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Status;
use App\Models\RequestForm;

class StatusController extends Controller
{
    public function createNewStatus(Request $req)
    {
        try {
            $user = Auth::user();
            $status = new Status();
            $status->user_id = $user->id;
            $status->form_id = $req->form_id;
            $status->status = $req->status;
            $status->reason = $req->reason;
            $status->save();

            $this->incrementStatus($form_id)

            $this->checkVerification();
        } catch (Exception $e) {
            return redirect('user/dashboard')->with('status', -1);
        }

        return redirect('admin/dashboard');
    }

    protected function checkVerification($form_id)
    {
        try {
            $requestForm = RequestForm::find($form_id)
            if ($requestForm->status == 10) {
                $this->sendToKajur();
            }
        } catch (Exception $e) {
            return FALSE;
        }
        return TRUE;
    }

    protected function incrementStatus($form_id)
    {
        try {
            $requestForm = RequestForm::find($form_id)
            $requestForm->status = $requestForm->status + 1;
            $requestForm->update();
        } catch (Exception $e) {
            return FALSE;
        }
        return TRUE;
    }

    protected function sendToKajur()
    {
        
    }
}
