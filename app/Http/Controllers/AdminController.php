<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RequestForm;
use Input;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

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

    public function connected(){
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
}