<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Exception;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
 

class AuthController extends Controller
{

    private $secret;
    private $username = "anilo";
    private $password = "anilo2021-tilltheend";


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->secret = config('app.jwt_secret');

    }
    public function login(Request $request){
        try {
            if(
                $request->username != "anilo" &&
                $request->password != "anilo2021-tilltheend"
            ){
                throw new Exception("Invalid username and password");
            }
    
            $time = Carbon::NOW()->addHour(1)->timestamp;
            $payload = array(
                "username" => $this->username,
                "name" => "sandi",
                "expires_in" => $time,
                "refresh_ttl" => $time
            );
            
            $jwt = JWT::encode($payload, $this->secret);
    
            return $this->respondWithToken($jwt,$time);
        } catch (\Throwable $th) {
            return response()->json([
                'result' => "FAILED",
                'message' => $th->getMessage()
            ], 200);
        }
        
    }
    protected function respondWithToken($token,$time)
    {
        return response()->json([
            'result' => "OK",
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $time,
        ], 200);
    }

}
