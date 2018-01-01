<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Doctor;
use Illuminate\Support\Facades\Auth;
use Response;

/**
 * Class cityController
 * @package App\Http\Controllers\API
 */
class doctorAPIController extends AppBaseController {

    public function __construct() {
        $this->middleware('doctor_api_auth');
    }

    protected function setDoctorActive(Request $request) {
      //  $doctor = Doctor::find($id);
$doctor= Auth::guard('api')->user();
        if ($doctor && $doctor instanceof Doctor) {
            $doctor->update(['active' => 1]);
            $doctor->save();
            return response()->json('success', 200);
        } else {
            return response()->json("Can't Find This Doctor Right Now");
        }
    }

    protected function setDoctorInactive(Request $request) {
       // $doctor = Doctor::find($id);
$doctor= Auth::guard('api')->user();

        if ($doctor && $doctor instanceof Doctor) {
            $doctor->update(['active' => 0]);
            $doctor->save();
            return response()->json('success', 200);
        } else {
            return response()->json("Can't Find This Doctor Right Now", 400);
        }
    }

    protected function getUser(Request $request) {
        $user = $request->user('api');
        return $user;
    }

}
