<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RequestForm;
use App\Model\Lodger;
use App\Model\Role;
use App\Model\Category;
use PDF;
use Auth;
use DB;
use Uuid;

class RequestsController extends Controller
{
    public function userDashboard(Request $req)
    {
    	try {
    		$requests = RequestForm::where('user_id', Auth::user()->id)->with('lodgers')->orderBy('created_at', 'desc')->paginate(15);
    		$data['roles'] = Role::get();
    		$data['category'] = Category::get();

    	} catch (Exception $e) {
    		return json_encode([
    			'status' => 500,
    			'error' => $e
    		]);
    	}
        $data['requests'] = $requests;

		// dd($data);
    	return view('user.dashboard', $data);
    }

    public function dummyPost()
    {
    	try {
    		$requests = RequestForm::where('user_id', 1)->with('lodger')->paginate(15);
    		$data['roles'] = Role::get();
    		$data['category'] = Category::get();
    	} catch (Exception $e) {
    		return json_encode([
    			'status' => 500,
    			'error' => $e
    		]);
    	}
    	$data['requests'] = $requests;
    	return view('user.dummy', $data);
    }

    public function createForm(Request $req)
    {
    	try {
     		DB::beginTransaction();
						$user_id = Auth::user()->id;
						$id=Uuid::generate();
    		$new_form = new RequestForm();
            $new_form->id = $id;
    		$new_form->user_id = $user_id;
    		$new_form->date = date("Y-m-d");
            $new_form->location = $req['location'];
            $new_form->status = 0;
    		$new_form->category_id = $req['category'];
    		$new_form->title = $req['title'];
    		$new_form->description = $req['description'];
    		$new_form->save();
            $new_form->slug = substr(bcrypt(Auth::user()->id), 0, 100).substr(bcrypt($new_form->created_at), 0, 10);
            $new_form->save();
            // $form_id = $new_form->id;
    		// $insert_lodger = $this->insertLodger($req['nrp'], $form_id);
						$form_id = $new_form->id;
						// dd($id);
    		$insert_lodger = $this->insertLodger($req['nrp'], $id);
    		if(!$insert_lodger)
    		{
    			DB::rollback();
    			return redirect('user/dashboard')->with('status', -2);
    		}
    	} catch (Exception $e) {
    		DB::rollback();
			return redirect('user/dashboard')->with('status', -1);
    	}
        DB::commit();
		return redirect('user/dashboard')->with('status', 1);
    }

    public function getRequestAdminDashboard(Request $req)
    {
        try {
          $requests = RequestForm::where('status',1)->orderBy('created_at')->paginate(3);
        } catch (Exception $e) {
          return json_encode([
      			'status' => 500,
      			'error' => $e
      		]);
        }
          $data['requests'] = $requests;
          return view('admin.dashboard',$data);
    }
    public function getHistoryAdminDashboard(Request $req)
    {
      try {
        $newReq = RequestForm::where('status',2)->orderBy('created_at')->paginate(15);
      } catch (Exception $e) {
        return json_encode([
          'status' => 500,
          'error' => $e
        ]);
      }
       $data['requests'] = $requests;
      return view('admin.dashboard',$data);
    }
    private function insertLodger($lodger, $form_id)
    {
			// dd($lodger);
    	try {
    		foreach($lodger as $user)
    		{
    			$new_lodger = new Lodger();
    			$new_lodger->user_nrp = $user;
    			$new_lodger->request_id = $form_id;
    			$new_lodger->save();
    		}
    	} catch (Exception $e) {
    		return FALSE;
    	}
    	return TRUE;
    }

    public function userCetak($id){
        $request = RequestForm::where([['id', '=', $id], ['status', '=', '10']])->first();
        if($request != null){
            $data['lodgers'] = Lodger::where('request_id', $id)->with('user')->get();
            
            if(count($data['lodgers']) > 0){
                $pdf = PDF::loadView('user.surat', $data);
                $pdf->setPaper('A4', 'potrait');
                $name = "Surat izin" . ".pdf";
                return $pdf->stream($name);
            }
            else {
                $data['lodgers'] = null;
                echo "error";
                return redirect('/home');
            }       
        }
        else{
            return 404;
        }
    }
}
