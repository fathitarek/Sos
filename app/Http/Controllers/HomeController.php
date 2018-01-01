<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session ;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth')->except(['homeEn' , 'homeAr']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function homeEn() {

        return view('public.register-now');
    }

     public function homeAr() {
        return view('/public/ar/home');
    }

    public function switchLang ($lang) {
      $language = [
        'ar' => 'arabic',
        'en' => 'english'
      ];
      if (array_key_exists($lang , $language)) {
          Session::put('applocale', $lang);
      }
      return redirect()->back();
   }

}
