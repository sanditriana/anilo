<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;

class UserController extends Controller
{

    private $secret;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->secret = config('app.jwt_secret');
    }
        
    
    /**
     * Show Profile from JWT as is
     *
     * @param Request $request [explicite description]
     *
     * @return Object
     */
    public function profile(Request $request) : Object {
        $arr['result'] = "OK";
        $arr['username'] = $request->auth->username;
        $arr['name'] = $request->auth->name;
        return response()->json($arr,200);
    }

    //
}
