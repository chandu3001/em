<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserToken;


class shield
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->header("authorization"))
        {
            return abort(404);
           
        }
        else
        {
            $token = str_replace("Bearer ",'', $request->header("authorization"));
            $check = UserToken::where("token",$token)->count();
        }

        return ($check>0) ? $next($request) : response()->json(["status" => false, "message" => "invalid token"], 400);
    }
}
