<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;

class SetLocale
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
      $language = [
        'ar' => 'arabic',
        'en' => 'english'
      ];

      if (Session::has('applocale') AND array_key_exists(Session::get('applocale'), $language)) {
          App::setLocale(Session::get('applocale'));
      }
      else { // This is optional as Laravel will automatically set the fallback language if there is none specified
          App::setLocale(Config::get('app.fallback_locale'));
      }
      return $next($request);
      // if(in_array($request->segment(1), config('app.locale')))
      //     {
      //         Session::put('cisgo.language_locale', $request->segment(1));
      //         //dd(" Session has " . Session::get('cisgo.language_locale') );
      //         return redirect()->to(substr($request->path(), 3));
      //     }
      //
      //     // Check if the session has the language
      //     if(!Session::has('cisgo.language_locale')) {
      //         Session::put('cisgo.language_locale', config('app.fallback_locale'));
      //     }
      //
      //     app()->setLocale(Session::get('cisgo.language_locale'));
      //     app()->setLocale('en');
      //     return $next($request);
    }
}
