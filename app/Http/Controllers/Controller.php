<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use File;
use Illuminate\Support\Facades\Input;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
   /*  function uploadFile($field_name, $destination) {
        if (!is_null(Input::file($field_name))) {
            $file = Input::file($field_name)->getClientOriginalName();

            $input[$field_name] = $file;

            $file1 = Input::file($field_name);

            $uploadSuccess = $file1->move($destination, $file);
            return $file;
        } else {
            return false;
        }
    }*/
    
}
