<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Doctor;
use App\Patient;
use App\Http\Controllers\GeneralClass;
use File;
use App\Models\specialty;
use App\Models\visit;
class DoctorController extends Controller {

    public function __construct() {
       // $this->middleware('auth');
      // Auth::guard($guard)->check();'
       //  $this->middleware('doctor.guest');
      // $this->middleware('CheckRoute');

      $handleDoctorRequest = new HandleDoctorRequest();
    }

    public function index() {
        $myarr = [];
        $count = GeneralClass::countWithCondationEquilty('App\Doctor', 'pending', 0);
        $myarr['count'] = $count;
        return GeneralClass::listData('App\Doctor', 10, 'admin.doctors.index', $myarr);
    }

    public function destroy($id) {
        return GeneralClass::deleteOne($id, 'App\Doctor', 'admin/doctors');
    }

    public function edit($id) {
       // $data = Doctor::findOrFail($id);
     $specialty = specialty::latest()->where('published', 1)->where('approved', 1)->pluck('name_en', 'id');

        //return view($url, compact('data'),$specialty);
       // return view('admin.doctors.edit')->with('data',$data)->with('specialty', $specialty);

 return GeneralClass::editForm($id, 'App\Doctor', 'admin.doctors.edit','specialty',$specialty);
    }

    public function update(Request $request, $id) {
        $doctor = Doctor::findOrFail($id);
        /**
         * override checkboxes to object $doctor
         */
        $doctor = updateCheckbox($request, $doctor, 'active');
        $doctor = updateCheckbox($request, $doctor, 'approved');
        $doctor = updateCheckbox($request, $doctor, 'verify');
        $doctor = updateCheckbox($request, $doctor, 'rejected');
        $doctor = updateCheckbox($request, $doctor, 'pending');
        $input = $request->all();
        /*
         * check file is not null to upload iage file
         */
        if (!is_null(Input::file('image_national_id'))) {
            $image_national_id = uploadFile('image_national_id', public_path() . '/upload');
            if (gettype($image_national_id) == 'string') {
                $input['image_national_id'] = $image_national_id;
            }
        }
        $doctor->update($input);
        Auth::user()->doctors()->save($doctor);
        return redirect('/admin/doctors');
    }

    public function filter(Request $request) {
//        $key=null;
//        $arr = $request->all();
//        foreach ($arr as $this->key => $value) {}
//        $data = Doctor::latest()->where($this->key, 0)->paginate(10);
//        $count = GeneralClass::countWithCondationEquilty('App\Doctor', 'pending', 0);
//        return view('admin.doctors.index', compact('data', 'count'));
//
         $myarr = [];
        $count = GeneralClass::countWithCondationEquilty('App\Doctor', 'pending', 0);
        $myarr['count'] = $count;
        return GeneralClass::listData('App\Doctor', 10, 'admin.doctors.index', $myarr,$request->all());
    }
     public function acceptVisit(Request $request)
    {
         //start_time= date("h:i:sa");
//    $request->visited=1;
       /*  $visit=new visit();
         return $request;
        $id = $request->visit ;
       // $visit = visit::find($id);
        $doctor_id = Auth::user('doctor')->id ;
        if($visit->status == "waiting")
        {
          $visit->update([
            'status' => 'accepted' ,
            //'doctor_id' => $doctor ,
          ]);

          $visit->save();

          return response()->json([ 'visit' => $visit ]);
        }

        return response()->json([ 'error' => "Invalid Request" ]);*/
         //
         // $input = $request->all();
         // $input['start_time']= date("G:i:s");
         // $input['charage']=0;
         // $input['end_time']=date("G:i:s");
         // $input['status']=1;
         // $visit = new visit($input);

         $visit = visit::find($request->visit);
         $patient = Patient::find($visit->patient_id);
         $doctor  = Doctor::find($visit->doctor_id);
         if($visit->status == "0"){
         $visit->update([
             'start_time' => date("G:i:s") ,
             'doctor_id' => $visit->doctor_id ,
             'status' => 1 ,
           ]);
           $visit->save();
           if($patient->mobile_identifier)
                $handleDoctorRequest->sendNotification($patient->mobile_identifier , "Visit Accepted" , $doctor->name . " Accepted Visit" , "data");

          return response()->json(['visit' => $visit , "message"=>"message"]);
         }

         return response()->json(["message"=>"This visit is not avaliable"]);

    }

    public function endVisit(Request $request)
    {
        $visit = visit::find($request->visit);
        $patient = Patient::find($visit->patient_id);
        $doctor  = Doctor::find($visit->doctor_id);
        if($visit)
        {
          $visit->update([
            'status' => 2 ,
            'comment' => "Visit Ended" ,
            'charage' => $request->charage ,
          ]);
          $visit->save();
          return response()->json(['visit' => $visit ]);
        }
        return response()->json([ 'error' => "Invalid Request" ]);
    }

    public function cancelVisit(Request $request)
    {
        $id = $request->visit ;
        $visit = visit::find($id);
        if($visit)
        {
          $visit->update([
            'status' => 'waiting' ,
          ]);
          $visit->save();
        return response()->json(['visit' => $visit ]);
        }
        return response()->json([ 'error' => "Invalid Request" ]);
    }
}
