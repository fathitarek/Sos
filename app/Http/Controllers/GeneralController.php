<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of generalClass
 *
 * @author fathi
 */
//use App\Http\Repo\generalInterface;
//namespace App\Traits;
namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
//use App\Http\Requests\CityRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Doctor;
//use App\Http\Repo\GeneralClass;
class   GeneralController  extends Controller {

//     public function __construct() {
//       // $this->middleware('auth');    
//       
//     }
//     
     
    public function index($modelName, $numberOfPagination, $url) {
        $records = $modelName::oldest()->paginate($numberOfPagination);
        return view($url, compact('records'));
    }

}
