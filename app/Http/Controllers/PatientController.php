<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Doctor;
use App\Models\visit ;
use App\Models\specialty ;
use App\Http\Controllers\HandleDoctorRequest;
use Auth ;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $handleDoctorRequest;

    public function __construct()
    {
      $handleDoctorRequest = new HandleDoctorRequest();
      $this->middleware('auth:patient' , [ 'only' => [ 'requestDoctor' , 'showRequestForm' ] ]);
    }
    public function index()
    {
        $patients = Patient::all();
        return view('admin.patients.index')->with('patients' , $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $patient = Patient::find($id);
      return view('admin.patients.show')->with('patient' , $patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $patient = Patient::find($id);
      return view('admin.patients.edit')->with('patient' , $patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function requestDoctor(Request $request)
    {
      $visit = $this->handleDoctorRequest->filter($request->speciality , $request->patient);
      return response()->json(['visit' => $visit , 'message' => 'success']);
    }

    public function showRequestForm(Request $request)
    {
        $specialities = specialty::all();
        $patient = Auth::user('patient') ;
        return view('patient.requestForm')->with('specialities' , $specialities)->with('patient' , $patient);
    }

    public function cancelVisit(Request $request)
    {
      $visit = visit::find($request->visit);
      $doctor = Doctor::find($visit->doctor_id);
      $patient = Patient::find($visit->patient_id);

      $visit->update([
        'status' => 2 ,
        'doctor_id' => null ,
        'comment' => "Patient Canceled" ,
      ]);

      $visit->save();

      $this->handleDoctorRequest->sendNotification($doctor->mobile_identifier , "Visit Canceled" , $patient->name . " Cancel Visit" , "data");
      return response()->json(['visit' => $visit , 'message' => 'success']);
    }


}
