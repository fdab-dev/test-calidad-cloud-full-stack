<?php

namespace App\Http\Middleware;

use Closure;
use Response; 
use Illuminate\Http\Request;

class CheckHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        /*
        return $next($request);
        */
        if(!isset($_SERVER["HTTP_X_CCLOUD_AUTH"])){  
            // cabecera no existente
            return Response::json(['error' => 'Not authorized. No header found.'], 403);
        }  
  
        if($_SERVER["HTTP_X_CCLOUD_AUTH"] != "prueba"){  
            // cabecera no válida
            return Response::json(['error' => 'Not authorized. Invalid value.'], 403);
        }  
  
        return $next($request); 
    }
}
