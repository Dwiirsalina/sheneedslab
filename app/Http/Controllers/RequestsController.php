<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RequestForm;
use App\Model\Lodger;
use Auth;
use DB;

class RequestsController extends Controller
{
    public function userDashboard(Request $req)
    {
    	try {
    		$requests = RequestForm::where('user_id', Auth::user()->id)->with('people')->paginate(15);
    	} catch (Exception $e) {
    		return json_encode([
    			'status' => 500,
    			'error' => 'Error Server'
    		]);
    	}
    	$data['requests'] = $requests;
    	return view('user.dashboard', $data);
    }

    public function createForm(Request $req)
    {
    	try {
    		DB::beginTransaction();	
    		$new_form = new RequestForm();
    		$new_form->user_id = Auth::user()->id;
    		$new_form->date = $req['date'];
    		$new_form->category_id = $req['category'];
    		$new_form->title = $req['title'];
    		$new_form->description = $req['description'];
    		$new_form->save();
    		$insert_lodger = $this->insertLodger($req['lodger'], $form_id);
    		if(!$insert_lodger)
    		{
    			DB::rollback();
    		}
    	} catch (Exception $e) {
    		
    	}
    }

    private function insertLodger($lodger, $form_id)
    {
    	try {
    		foreach($lodger as $user)
    		{
    			$new_lodger = new Lodger();
    			$new_lodger->user_id = $user;
    			$new_lodger->form_id = $form_id;
    			$new_lodger->save();
    		}
    	} catch (Exception $e) {
    		return FALSE;
    	}
    	return TRUE;
    }
}