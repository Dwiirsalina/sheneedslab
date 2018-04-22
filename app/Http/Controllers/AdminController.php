<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RequestForm;
use Input;
use App\Model\User;
use GuzzleHttp\Client;
use App\Model\Status;
use Auth;

class AdminController extends Controller
{
    public function getAdminHistory(Request $req)
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

    public function connected()
    {
      $code = Input::get('code', false);
      $state = Input::get('state', false);
      // dd($code,$state);
      try{
        $client = new Client();
        $response = $client->request('POST', 'https://notify-bot.line.me/oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => 'http://192.168.33.10/admin/connected',
                'client_id' => '8wlegGyCdDpQvGZUUf9SPC',
                'client_secret' => 'c5LDdxPjMSEh5qJDrWeLgArmxwINVEjgc2lOSAMRVCC'
            ]
        ]);
        $body = json_decode($response->getBody()->getContents());

        $user = User::find(Auth::user()->id);
        $user->line_token = $body->access_token;
        $user->save();
      } catch (GuzzleHttp\Exception\ClientException $e) {
            return json_encode([
                'status' => 500,
                'error' => $e
            ]);
      }
      return view('admin.connected');
    }

    public function confirm(Request $req, $slug)
    {
      if(!Auth::user()->id)
        return redirect('login');
      try {
        $request_form = RequestForm::where('slug', $slug)->first();

        $new_status = new Status();
        $new_status->user_id = Auth::user()->id;
        $new_status->request_id = $request_form->id;
        
        if($req['confirmation'.$slug] == -1)
        {
          $new_status->reason = $req['reason'.$slug];
          $request_form->status = $request_form->status - 1;
        }
        else
        {
          $request_form->status = $request_form->status + 1; 
        }
        $new_status->save();
        $request_form->save();
        return redirect('admin/dashboard')->with('status', 1);
      } catch (Exception $e) {
        return redirect('admin/dashboard')->with('status', -1); 
      }
    }

    public function adminHistory(Request $req)
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
      return view('admin.history',$data);
    }
}