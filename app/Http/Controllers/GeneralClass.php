<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase;
/**
 * Description of GeneralClass
 * General Class is a class contain functions is
 * generic to be reusable in any Controller
 * class is contains (
 * 1-listData -> list all  data from model
 * 2-deleteOne -> delete one record from model
 * 3-editForm -> show data of one user  from model in view
 * 4-createForm ->show view in create from  
 */
class GeneralClass {

    /**
     * 
     * @param type $array
     * @return type array that carry keys of array parameters
     */
    static function divideArrayAsKey($array) {
        $iteratorKey = 0;
        $arrayOfKeys;
        foreach ($array as $key => $value) {
            $arrayOfKeys[$iteratorKey] = $key;
            // $arrayOfValues[$iterator] = $value;  
            ++$iteratorKey;
        }

        return $arrayOfKeys;
    }

    /**
     * 
     * @param type $array
     * @return type array that carry values of array parameters
     */
    static function divideArrayAsValue($array) {
        $iteratorValue = 0;
        $arrayOfValues;
        foreach ($array as $key => $value) {
            // $arrayOfKeys[$iterator] = $key;
            $arrayOfValues[$iteratorValue] = $value;
            ++$iteratorValue;
        }
        return $arrayOfValues;
    }

    /**
     * 
     * @param type $modelName
     * @param type $numberOfPagination
     * @param type $url (link view that show this data)
     * @param type $arrayOfVar (variable sent with view)
     * @return  type $url (view with data)
     */
    static function listData($modelName, $numberOfPagination, $url, $arrayOfVar = null, $condation = null) {
        $key = null;
        if ($condation) {

//       $arr = $request->all();
            foreach ($condation as $key => $value) {
              //  echo $key;
            }
            $data = $modelName::latest()->where($value, 0)->paginate($numberOfPagination);
        } else {
            $data = $modelName::latest()->paginate($numberOfPagination);
        }
        if ($arrayOfVar) {
            $basic_array = ['data' => $data];
            $keysArray = GeneralClass::divideArrayAsKey($arrayOfVar);
            $valueArray = GeneralClass::divideArrayAsValue($arrayOfVar);
            for ($i = 0; $i < sizeof($keysArray) && $i < sizeof($valueArray); $i++) {
                $basic_array = array_merge($basic_array, array($keysArray[$i] => $valueArray[$i]));
            }
            return view($url, $basic_array);
            // return view($url, ['data' => $data]);    
        } else {
            return view($url, compact('data'));
        }
        // return view($url, compact('data'));
    }

    /**
     * 
     * @param type $id
     * @param type $modelName
     * @param type $url (link view that show this data)
     * @return type $url (view with data)
     */
    static function deleteOne($id, $modelName, $url) {
        $data = $modelName::findOrFail($id);
        $data->delete();
        return redirect($url);
    }

    /**
     * 
     * @param type $id
     * @param type $modelName
     * @param type $url
     * @return type $url (view with data)
     */
    static function editForm($id, $modelName, $url,$extraName=null,$extraData=null) {
        $data = $modelName::findOrFail($id);
        if (!is_null($extraData)){
           return view($url)->with('data',$data)->with($extraName,$extraData);
        }
        else{
        return view($url, compact('data'));
        }
    }

    /**
     * 
     * @param type $url view form
     * @return view 
     */
    static function createForm($url) {
        return view($url);
    }

    /**
     * 
     * @param type $modelName
     * @param type $condation1
     * @param type $condation2
     * @return type
     */
    static function countWithCondationEquilty($modelName, $condation1, $condation2) {
        $number = $modelName::where($condation1, $condation2)->count();
        return $number;
    }

 
    /**
     * configuration firebase
     * @return object from firebase
     */
    
    static function firebaseGenral(){

         //configration file
        // $serviceAccount = ServiceAccount::fromJsonFile('/tracking-48fae-firebase-adminsdk-6mxv1-418206081d.json');
        $serviceAccount = ServiceAccount::fromJsonFile(storage_path() . "/app/json/tracking-48fae-firebase-adminsdk-6mxv1-418206081d.json");

        //create object firebase
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->create();
        return $firebase;
    }
}
