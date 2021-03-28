<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class Cookie
{

    public function handle($request, Closure $next)
    {
        if (!$request->cookie('cart_identifier')) {


           $response = new Response(redirect(route('api.carts.index')));

           $identifier = Str::random(11);;

           $response->withCookie( cookie('cart_identifier', $identifier,60*12*60));

           return $response;
        }

        return $next($request);
    }
}
