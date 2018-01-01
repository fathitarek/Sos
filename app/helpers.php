<?php

/**
 * Created by PhpStorm.
 * User: Ahmed Waly
 * Date: 1/5/2016
 * Time: 3:31 PM
 */
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Nette\Mail\Message;

function setCheckbox($record, $field) {

    if ($record->get($field) === 'on') {
//            $record->$field = '1';  // UPDATE:must be true of course
        $record->offsetSet($field, 1);
    } else {
//            $record->$field = '0'; // UPDATE:must be false of course
        $record->offsetSet($field, 0);
    }
    return $record;
}

function updateCheckbox($request, $record, $field) {
    if ($request->get($field) === 'on') {
        $record->$field = '1';  // UPDATE:must be true of course
        $request->offsetSet($field, 1);
    } else {
        $record->$field = '0'; // UPDATE:must be false of course
        $request->offsetSet($field, 0);
    }
    return $record;
}

function intArrayToStringArray($int_array) {
    $string_array = '';
    foreach ($int_array as $key => $int_value) {
        $string_array[] = '' . $int_value . '';
    }
    return $string_array;
}

function sendEmail($template, $data) {
    Mail::send('emails.' . $template, [
        'name' => $data['name'],
        'username' => $data['username'],
        'mobile' => $data['mobile'],
        'email' => $data['email'],
        'region' => $data['region'],
        'country' => $data['country'],
        'title' => $data['title'],
        'message_type' => $data['message_type'],
        'car' => $data['car'],
        'm' => $data['m']
            ], function($message) use ($data) {
        if ($data['cc'] != NULL) {
            $message->to($data['to'], $data['name'])->subject($data['subject'])->from($data['email'], $data['username'])->cc($data['cc']);
        } else {
            $message->to($data['to'], $data['name'])->subject($data['subject'])->from($data['email'], $data['username']);
        }
    });
}

function exportToExcel($data, $filename, $sheetname) {

    Excel::create($filename, function($excel) use ($data, $sheetname) {
        $excel->sheet($sheetname, function($sheet) use ($data) {
            $sheet->fromArray($data, null, 'A1', false, true);
        });
    })->download('xls');
}

function importExcelFile($loaction, $file, $model) {

    Excel::load($loaction . '/' . $file, function ($reader) use($model) {
        foreach ($reader->toArray() as $row) {
            if ($row['id'] != "new") {
                $record = $model->findOrFail($row['id']);
                $record->update($row);
            } else {
                // Auth::user()->locationCategories()->save($location_category);
                $model->firstOrCreate($row);
            }
        }
    });
    echo 'yes';
}

function searchForEloquentRecord($model, $column, $value) {
    $record = $model::latest()->where($column, $value)->get();
    return $record;
}

function uploadFile($field_name, $destination) {
    if (!is_null(Input::file($field_name))) {
        $file = Input::file($field_name)->getClientOriginalName();
        $input[$field_name] = $file;
        $file1 = Input::file($field_name);
        $uploadSuccess = $file1->move($destination, $file);
        return $file;
    } else {
        return false;
    }
}
   function get($modelName, $numberOfPagination, $url) {
    echo $modelName. $numberOfPagination. $url;
        $data = $modelName::latest()->get();
        return view($url, compact('data'));
    } 
    
     function canAccess($user,$requested_route) {
       // $requested_route = '/' . $requested_route;
        $my_routes = $user->role->routes;
        foreach ($my_routes as $route) {
            //dd ($requested_route);
            if ($route->route == $requested_route) {
                return true;
            }
        }
        return false;
    }

    
?>
