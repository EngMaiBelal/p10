<?php

namespace App\Http\Middleware;

use App\traits\generalTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class checkLanguage
{
    use generalTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $lang = $request->header('lang');
        $supportedLanguages = ['ar','en'];
        // if(isset($lang)){
        //     if(in_array($lang,$supportedLanguages)){
        //         App::setLocale($lang);
        //         return $next($request);
        //     }else{
        //         return $this->returnErrorMessage("Not Supported Language",400);
        //     }
        // }else{
        //     return $this->returnErrorMessage("You Must Send Lang",422);
        // }

        if(empty($lang)){
            return $this->returnErrorMessage("You Must Send Lang",422);
        }

        if(!in_array($lang,$supportedLanguages)){
            return $this->returnErrorMessage("Not Supported Language",400);
        }

        App::setLocale($lang);
        return $next($request);

    }
}
