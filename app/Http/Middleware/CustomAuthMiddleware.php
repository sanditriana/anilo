<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Support\Carbon;
use PhpParser\Node\Expr\Throw_;
use Firebase\JWT\JWT;

class CustomAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $bearer = $request->bearerToken();
            if(!$bearer){
                throw new Exception ("Token not found");
            }

            $result = JWT::decode($bearer,  config('app.jwt_secret'), array('HS256'));
            $xpire = Carbon::parse($result->expires_in);
            
            if($xpire->lt(Carbon::NOW())){
                throw new Exception ("Token Expired");
            }

            $request->auth=$result;

        } catch (\Throwable $th) {
            return response()->json(
                [
                    'result'=>'FAILED',
                    "message"=>$th->getMessage()
                ],200
            );
        }
        
        return $next($request);
    }
}
