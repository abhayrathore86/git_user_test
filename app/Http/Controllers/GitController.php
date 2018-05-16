<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class GitController extends Controller{

    public function index(Request $request){
        return view('git_user');
    }
    public function ajax_call(Request $request){
        $text_val = $request->get('val_text');

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://api.github.com/search/users?q='.$text_val,[
            'auth' => [ENV('GIT_USER_NAME'), ENV('GIT_PASSWORD')]
        ]);

        $user_data = json_decode($res->getBody());
        return view('git_user_view',compact('user_data',$user_data));
    }
    public function fetch_followers(Request $request){

            $text_val = $request->get('val_text');
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', $text_val,[
                'auth' => [ENV('GIT_USER_NAME'), ENV('GIT_PASSWORD')]
            ]);
             $user_followers_data = json_decode($res->getBody());
             return view('git_user_follower', compact('user_followers_data'));
        }
}

?>